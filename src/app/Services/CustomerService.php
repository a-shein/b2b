<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Customer;
use Illuminate\Support\Collection;

class CustomerService
{
    /**
     * Получаем статьи автора. Данный метод избыточный. Работа с базой не в контроллере, а в отдельном сервисе
     * @param Customer $customer
     * @return Collection
     */
    public function getTopicsByCustomer(Customer $customer): Collection
    {
        return $customer->topics;
    }
}
