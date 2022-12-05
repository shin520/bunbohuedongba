<?php

namespace App\Http\Controllers;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;
class LogController extends Controller
{
    public function index(){
        // Activity::truncate();
        $data = Activity::orderby('id','desc')->paginate(10);
        return view('be.log.index',compact('data'));
    }


    public function destroy($id){
        $data = PostType::find($id);
        $data->delete();
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.posttype.index');
    }


    public function show_log(Request $request){
           if($request->ajax()){
            $data = Activity::find($request->id);
            $value = $data->properties;
            $value['old'] = $value['old'];
            $value['new'] = $value['attributes'];
            $diff = array_diff($value['old'],$value['new']);
            $result=[];
            foreach ($diff as $key_column => $value_diff) {
                $result[] = [
                    'causer' => $data->causer->name,
                    'column' => $key_column,
                    'origin' => $value['old'][$key_column],
                    'diff'   => $value['new'][$key_column],
                    'time'   => Carbon::parse($data->created_at)->format('d-m-Y  H:m:s'),

                ];
            }
            $output = '';
                foreach($result as $row)
                {
                   $output .= '<tr>
                   <td data-label="NGƯỜI THỰC HIỆN">'.$row['causer'].'</td>
                   <td data-label="CỘT">'.$row['column'].'</td>
                   <td data-label="NỘI DUNG GỐC">'.$row['origin'].'</td>
                   <td data-label="NỘI DUNG MỚI"><span><del class="text-danger mr-2">'.$row['origin'].'</del><ins class="text-primary">'.$row['diff'].'</ins></span></td>
                   <td data-label="THỜI GIAN">'.$row['time'].'</td>
                   </tr>';
               }
               $output .= '</ul>';
               echo $output;
           }
    }
}
