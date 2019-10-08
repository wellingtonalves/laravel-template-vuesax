<?php

namespace App\Listeners;

class DeleteNestedRelationship
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object $event
     *
     * @return void
     */
    public function handle($event)
    {
//        $nesteds = $event->model->nested;
//        $model   = $event->model;
//
//        if (!$nesteds) {
//            return;
//        }
//        foreach ($nesteds as $nested) {
//            foreach ($model->$nested()->get() as $data) {
//                $data->delete();
//            }
//        }
    }
}
