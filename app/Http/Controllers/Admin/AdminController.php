<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    const VIEW_PRFIX = 'admin.';

    public function render($view = null, $data = [], $mergeData = []) {
        return view(self::VIEW_PRFIX.$view, $data, $mergeData);
    }

    public function getUser()
    {
        return Auth::guard('admin')->user();
    }

    public function get($class)
    {
        return new $class($this->getUser());
    }

    protected function complete_zeros($number)
    {
        $ch = '';
        $i = 0;
        while ($i != $number) {
            $ch .= '0';
            $i++;
        }
        return $ch;
    }

    protected function format_reference($value)
    {
        if (intval($value / 10) == 0) {
            return $this->complete_zeros(4) . $value;
        } elseif (intval($value / 100) == 0) {
            return $this->complete_zeros(3) . $value;
        } elseif (intval($value / 1000) == 0) {
            return $this->complete_zeros(2) . $value;
        } elseif (intval($value / 10000) == 0) {
            return $this->complete_zeros(1) . $value;
        }
        return $this->complete_zeros(0) . $value;
    }

}
