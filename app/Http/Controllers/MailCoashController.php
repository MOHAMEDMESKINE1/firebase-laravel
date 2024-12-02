<?php

namespace App\Http\Controllers;

use App\Mail\EmailMailCoash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Kreait\Firebase\Value\Email;
use Spatie\MailcoachSdk\Facades\Mailcoach;
use Spatie\MailcoachSdk\Resources\EmailList;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class MailCoashController extends Controller
{
    /**
     * Display a list of subscribers, email list details, and campaigns.
     *
     * This method retrieves and displays the subscribers of a specific email list,
     * details of the email list, and campaigns associated with it using the Mailcoach SDK.
     */

    public function index()
    {
        echo '<h1>Subscribers</h1>';

        $subscribers = Mailcoach::emailList('6992b72f-c7a8-4c13-bbb6-3a0d121de254')->subscribers();

        dump($subscribers);

        echo '<h1>Email List</h1>';

        $emailList = Mailcoach::emailList('6992b72f-c7a8-4c13-bbb6-3a0d121de254');
        dump($emailList);

        echo '<h1>All Campaigns </h1>';

        $campaigns = Mailcoach::campaigns();
        dump($campaigns);

        echo '<h1>Specific Campaign by ID</h1>';

        $campaigns = Mailcoach::campaign('6bd47109-5c00-4279-9a76-5402d04bff3e');
        dump($campaigns);
    }

    public function createNotification()
    {
        // notify()->success('This is a success message!', 'Success');
        // notify()->error('This is a success error!', 'Error');
        // connectify('success', 'Connection Found', 'Success Message Here');
        // connectify('error', 'Connection Error', 'Error Message Here');
        // drakify('error');
        // smilify('success', 'You are successfully reconnected');
        // emotify('success', 'You are awesome, your data was successfully created');
        notify()->preset('user-deleted');
        // dd($data);
        return redirect()->route('dashboard'); // Replace with your Inertia page route
    }

    /**
     * Retrieve a list of all sent emails.
     *
     * This method uses the Mailcoach API to retrieve a list of all sent emails.
     * The list is then dumped to the screen.
     */
    public function getSends()
    {
        notify()->success('Welcome to Laravel Notify ⚡️');

        $response = Http::withToken('GNjA7Db3UObJPeUaVYneJieu5jzZu0peLdjAy8Kda5460535')->get('https://mohamed-meskine.mailcoach.app/api/sends');

        $sends = $response->json();

        dd($sends);
    }
    /**
     * Retrieve the user associated with the API token.
     *
     * This method uses the Mailcoach API to retrieve the user associated with the
     * API token. The user is then dumped to the screen.
     */

    public function getUser()
    {
        $response = Http::withToken('GNjA7Db3UObJPeUaVYneJieu5jzZu0peLdjAy8Kda5460535')->get('https://mohamed-meskine.mailcoach.app/api/user');

        $user = $response->json();

        dd($user);
    }
    /**
     * Send an email to a list of subscribers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmail()
    {
        try {
            Mail::to('meskinemohamedbuisness@gmail.com')->send(new EmailMailCoash());

            return response()->json([
                'message' => 'Email sent successfully!',
            ]);
        } catch (\Exception $e) {
            return 'Failed to send email: ' . $e->getMessage();
        }
    }

    /**
     * Create a new email list.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function emailList()
    {
        try {
            $myList = Mailcoach::createEmailList([
                'name' => 'My new email list created ',
                'default_from_email' => 'mohamed-meskine@mailcoach.cloud',
                'default_from_name' => 'Med',
            ]);

            return response()->json([
                'message' => 'List created successfully!',
                'list' => $myList,
            ]);
        } catch (\Exception $e) {
            return 'Failed to create an email list : ' . $e->getMessage();
        }
    }

    /**
     * Add a new subscriber to the email list.
     *
     * Attempts to create a new subscriber using the Mailcoach service with
     * the specified email and name attributes. Returns a JSON response
     * indicating success or failure.
     *
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function subscriber()
    {
        try {
            $subscriber = Mailcoach::createSubscriber(
                emailListUuid: '6992b72f-c7a8-4c13-bbb6-3a0d121de254',
                attributes: [
                    'email' => 'med.meskine1996@gmail.com',
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                ],
            );

            return response()->json([
                'message' => 'Subscriber added successfully!',
                'subscriber' => $subscriber,
            ]);
        } catch (\Exception $e) {
            return 'Failed to create a subscriber : ' . $e->getMessage();
        }
    }

    /**
     * Search for a subscriber.
     *
     * Attempts to search for a subscriber using the Mailcoach service and
     * returns the subscriber data if found.
     *
     * @return array|null
     */
    public function searchSubscribers()
    {
        // $subscriber = Mailcoach::subscriber("f819ee83-548c-4d62-8d95-fd424f69e969");
        $subscriber = Mailcoach::subscriber('63201544-2975-47fe-af90-302e6c65d064');

        $subscriberData = [
            'email' => $subscriber->email,
            'first_name' => $subscriber->first_name ?? null,
            'last_name' => $subscriber->last_name ?? null,
        ];
        return $subscriberData;
    }

    /**
     * Confirm a subscriber.
     *
     * Attempts to confirm a subscriber using the Mailcoach service and
     * returns a JSON response indicating success or failure.
     *
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function confirmSubscriber()
    {
        try {
            $subscriber = Mailcoach::subscriber('f819ee83-548c-4d62-8d95-fd424f69e969');

            $subscriber->confirm();

            return response()->json([
                'message' => 'Subscriber confirmed successfully!',
                'subscriber' => $subscriber,
            ]);
        } catch (\Exception $e) {
            return 'Failed to confirm a subscriber : ' . $e->getMessage();
        }
    }
    /**
     * Unsubscribe a subscriber from the email list
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function unsubscribeSubscriber()
    {
        try {
            $subscriber = Mailcoach::subscriber('f819ee83-548c-4d62-8d95-fd424f69e969');

            $subscriber->unsubscribe();

            return response()->json([
                'message' => 'Subscriber confirmed unsubscribtion successfully!',
                'subscriber' => $subscriber,
            ]);
        } catch (\Exception $e) {
            return 'Failed to unsubscribe a subscriber : ' . $e->getMessage();
        }
    }

    /**
     * Delete a subscriber
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSubscriber()
    {
        try {
            $subscriber = Mailcoach::subscriber('adf685fa-ceab-4ddd-95f1-bc509eb75865');

            $subscriber->delete();

            return response()->json([
                'message' => ' confirmed deletion subscription successfully!',
                'subscriber' => $subscriber,
            ]);
        } catch (\Exception $e) {
            return 'Failed to delete a subscriber : ' . $e->getMessage();
        }
    }

    public function getCampaigns()
    {
        $campaigns = Mailcoach::campaigns();

        dd($campaigns);
    }
    public function campaign()
    {
        try {
            $campaign = Mailcoach::createCampaign([
                'name' => 'My new campaign created ',
                'subject' => 'Here is some fantastic content for you',
                'email_list_uuid' => '6992b72f-c7a8-4c13-bbb6-3a0d121de254',

                // optionally, you can specify the uuid of a template
                'template_uuid' => 'c118d448-92ae-4887-b39c-76c0ae849164',

                // if that template has field, you can pass the values
                // in the `fields` array. If you use the markdown editor,
                // we'll automatically handle any passed markdown
                'fields' => [
                    'title' => 'Content for the title place holder',
                    'content' => '# My title',
                ],
            ]);

            $campaign->sendTest('meskinemohameddev@gmail.com');

            return response()->json([
                'message' => 'campaign created successfully!',
                'campaign' => $campaign,
            ]);
        } catch (\Exception $e) {
            return 'Failed to create campaign: ' . $e->getMessage();
        }
    }
}
