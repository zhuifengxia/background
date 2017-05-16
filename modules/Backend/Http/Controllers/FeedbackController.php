<?php namespace Modules\Backend\Http\Controllers;
/**
 * 题库用户反馈
 * User: 许影
 * DateTime: 2016/6/3 14:15
 * CopyRight：医库软件PHP小组
 */
use Pingpong\Modules\Routing\Controller;

class FeedbackController extends Controller {


	public function examerrorlist(){

//       return redirect('/backend');

        return backendView('feedback.examerrorlist');
    }
    public function feedbacklist(){

        return backendView('feedback.feedbacklist');
    }
    public function examanalyze(){

        return backendView('feedback.examanalyze');
    }
}