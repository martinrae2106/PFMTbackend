<?php

namespace App\Http\Controllers;

use App\Donator;
use Illuminate\Http\Request;
use App\Http\Resources\CheckoutCollection;
//use App\Donation;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class CheckoutController extends Controller
{

    public function store(Request $request)
    {

        //could put the donator create up here then add the success or failed donation linked to the donator?

        try {
            $charge = Stripe::charges()->create([
                'amount' => $request->amount,
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'Donation for PresentForMyTeacher Ireland',
                'receipt_email' => $request->email,
                'metadata' => [
                    'Address' => $request->address,
                    'City' => $request->city,
                    'PostalCode' => $request->postalcode, 
                    'NameOnCard' => $request->name_on_card,
                    'Email'=> $request->email,
                ],
            ]);//save this info to your database

            $data = [
                'fullName' => $request->name_on_card,
                'emailAddress' => $request->email,
                'postalCode' => $request->postalcode,
                'billingAddress1' => $request->address,
                'billingAddress2' => '',
                'cityTown' => $request->city, 
                'region' => '',
                'emailContactApproved' => 1,
                'childName' => '',
                'teacherName' => '',
            ];
         
            $donator = Donator::create($data);

            //successful
            return back()->with('success_message', 'Thank_You! Your donation has been accepted.');
        } catch (CardErrorException $e) {
            //save info to database for failed
            return back()->withErrors('Error! ' .$e->getMessage());
        }

    }
}

