<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class TopicController extends Controller
{
    /**
     * Пользователь создает новую статью
     * @param Request $request
     * @param TopicService $topicService
     * @return Response
     */
    public function createTopic(Request $request, TopicService $topicService): Response
    {
        try {
            $data = $this->validate($request, [
                'customer_id' => 'required|exists:App\Models\Customer,id',
                'title' => 'required|unique:topics|min:10|max:255',
                'text' => 'required|min:10|max:255',
            ]);
        } catch (ValidationException $exception) {
            return response(['exception' => $exception->getMessage()]);
        }

        $topic = $topicService->createNewTopic($data);

        return response(['id' => $topic->id]);
    }

    /**
     * Получаем автора статьи
     * @param Topic $topic
     * @param TopicService $topicService
     * @return Response
     */
    public function getTopicAuthor(Topic $topic, TopicService $topicService): Response
    {
        $topicAuthor = $topicService->getTopicAuthorByTopic($topic);

        return response("Автор статьи с id $topic->id - $topicAuthor->name");
    }

    /**
     * @param Topic $topic
     * @param Request $request
     * @param TopicService $topicService
     * @return Response
     */
    public function editTopicAuthor(Topic $topic, Request $request, TopicService $topicService): Response
    {
        try {
            $data = $this->validate($request, [
                'customer_id' => 'required|exists:App\Models\Customer,id',
            ]);
        } catch (ValidationException $exception) {
            return response(['exception' => $exception->getMessage()]);
        }

        $oldAuthor = $topic->customer;
        try {
            $editTopic = $topicService->editTopicAuthor($topic, $data);
        } catch (\Exception $exception) {
            return response($exception->getMessage());
        }

        return response("В статье с id - $topic->id изменен автор с $oldAuthor->name на автора {$editTopic->customer->name}");
    }
}
