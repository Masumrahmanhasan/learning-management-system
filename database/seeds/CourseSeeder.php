<?php

use App\Models\Course;
use App\Models\CourseTimeline;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Course::class, 50)->create()->each(function ($course) {

            $course->teachers()->sync([2]);
            $course->lessons()->saveMany(factory(Lesson::class, 10)->create());
            foreach ($course->lessons()->where('published', '=', 1)->get() as $key => $lesson) {
                $key++;
                $timeline = new CourseTimeline();
                $timeline->course_id = $course->id;
                $timeline->model_id = $lesson->id;
                $timeline->model_type = Lesson::class;
                $timeline->sequence = $key;
                $timeline->save();
            };

        });
    }
}
