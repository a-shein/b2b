<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Service\CustomerService;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Получить все статьи автора
     * @param Customer $customer
     * @param CustomerService $customerService
     * @return Response
     */
    public function getCustomerTopics(Customer $customer, CustomerService $customerService): Response
    {
        $customerTopics = $customerService->getTopicsByCustomer($customer);

        return response($customerTopics->toJson());
    }
}
