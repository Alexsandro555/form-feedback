<?php
/**
 * Created by PhpStorm.
 * User: alexsandro
 * Date: 02.04.18
 * Time: 17:02
 */

namespace Leader\FormFeedback\Controllers;
use Illuminate\Http\Request;
use Leader\FormFeedback\Models\Order;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class FormFeedbackController extends Controller
{

  public function getUID(Request $request) {
    if($request->acceptsJson() && starts_with($request->server('HTTP_REFERER'),'http://'.$request->server('HTTP_HOST'))) {
      return Session::get('UID');
    }
    else {
      throw new \Exception('Попытка несанкционированного доступа');
    }
  }

  public function save(Request $request) {
    if($request->uid === Session::get('UID')) {
      $this->validate($request, [
        'fio' => 'required',
        'company' => 'required',
        'tel' => 'required',
        'email' => 'required|email',
      ]);
      Order::create($request->all());
      return ['message' => 'Feedback saved'];
    }
    else {
      throw new \Exception('Попытка несанкционированного доступа');
    }
  }
}