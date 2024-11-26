<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import auth from '../firebase.js'; // Import your Firebase configuration from a separate file
import { RecaptchaVerifier, signInWithPhoneNumber } from "firebase/auth";

const phoneNumber = ref('');
const errorMessage = ref('');
let recaptchaVerifier;
const props = defineProps( {
  sents:Array
})
console.log(props.sents);
// Initialize reCAPTCHA verifier on component mount
onMounted(() => {
  recaptchaVerifier = new RecaptchaVerifier(auth,'recaptcha-container', {
    size: 'invisible',
    callback: () => {
      // Recaptcha verification completed
    }
  }, auth);
});

const form = useForm({
  phoneNumber:'',
  token:''
})


// Function to sign in with phone number
const signInWithPhone = async () => {
  try {
    const confirmationResult = await signInWithPhoneNumber(auth, form.phoneNumber, recaptchaVerifier);
    const verificationCode = prompt('Please enter the verification code', '');
    const result = await confirmationResult.confirm(verificationCode);
    console.log('User signed in:', result.user);
   
    form.token = result.user.accessToken

    form.post(route('verify'));

  } catch (error) {
    errorMessage.value = error.message;
    console.error('Phone authentication error:', error);
  }
};

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900  flex flex-col">
                        
                            <h2 class="text-2xl font-semibold mb-3">Phone Authentication</h2>
                            <div class="form-group ">
                            <label for="phoneNumber" class="my-2">Phone Number:</label> <br>
                            <input type="text" id="phoneNumber" v-model="form.phoneNumber" placeholder="Enter phone number" class="w-full   rounded      ">
                            <div class="error-message text-red-500">{{ errorMessage }}</div>

                            </div>
                            <div id="recaptcha-container"></div>
                            <button class="btn bg-black text-white p-3 rounded mt-3" @click="signInWithPhone">Send Verification Code</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900  flex flex-col">
                        
                            <h2 class="text-2xl font-semibold mb-3">Sent Transactions</h2>
                         
                            <div v-for="user in sents.data" :key="user.uuid" class="p-2">
                                
                                  <div class="p-2">
                                    <li class="bg-gray-200"> UserId :{{ user.uuid }}</li>
                                    <li class="bg-green-200">SentAt :{{ user.sent_at }}</li>
                                    <li class="bg-blue-200">CreatedAt :{{ user.created_at }}</li>
                                  </div><br>
                               
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
