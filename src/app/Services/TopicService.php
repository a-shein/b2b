<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Topic;

class TopicService
{
    /**
     * Создаем новую статью в DB
     * @param array $data
     * @return Topic
     */
    public function createNewTopic(array $data): Topic
    {
        $topic = new Topic($data);
        $topic->save();

        return $topic;
    }

    /**
     * Получаем автора статьи. Данный метод избыточный. Работа с базой не в контроллере, а в отдельном сервисе
     * @param Topic $topic
     * @return Customer
     */
    public function getTopicAuthorByTopic(Topic $topic): Customer
    {
        return $topic->customer;
    }

    /**
     * Меняем автора статьи.
     * @param Topic $topic
     * @param array $data
     * @return Topic
     * @throws \Exception
     */
    public function editTopicAuthor(Topic $topic, array $data): Topic
    {
        if ($topic->customer_id === $data['customer_id']) {
            throw new \Exception('Статья уже принадлежит этому пользователю');
        }

        $topic->customer_id = $data['customer_id'];
        $topic->save();
        $topic->refresh();

        return $topic;
    }
}
