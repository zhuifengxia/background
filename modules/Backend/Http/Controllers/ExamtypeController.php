<?php namespace Modules\Backend\Http\Controllers;
/**
 * User: 邵仲强
 * DateTime: 2016/6/3 14:20
 * CopyRight：医库软件PHP小组
 */
use Pingpong\Modules\Routing\Controller;
use Modules\Backend\Entities\ExamBanktypes;
use Validator;
use ValidationException;

class ExamtypeController extends Controller {

   //医考天地分类列表
    public function examtypelist()
    {
        $examtypelsts=ExamBanktypes::paginate(5);
        return backendView('examtype.examtypelist',['examtypelsts'=>$examtypelsts]);
        //return view('backend::examtype.examtypelist',['examtypelsts'=>$examtypelsts]);
    }
    //添加编辑医考天地分类
    public function addexamtype( $id=0 )
    {
        if(!empty($id)){
            //var_dump($id);exit;
            $examtype = ExamBanktypes::find( $id );
        }
        else{
            $examtype= new ExamBanktypes();
        }
        return backendView('examtype.addexamtype',['examtype'=>$examtype]);
        //return view('backend::addexamtype',['$examtype'=>$examtype]);
    }
    //保存已添加编辑医考天地分类
    public function saveexamtype()
    {
        //表单验证
        $validate = Validator::make(post(), [
            'banktypename'  => 'required',
            'banknum' => 'required'
        ],['banktypename.required'=>'分类名不能为空',
            'banknum.required'=>'序号不能为空']);

        if( $validate->fails() ) {
           // return view('backend::examtype.examtypelist',['errors' => $validate->errors(),'examtype'=>$examtype ]);
            return backendView('examtype.addexamtype',['errors' => $validate->errors()]);
        }
        $examtype= new ExamBanktypes();

        $examtype->setRawAttributes([
            'banktypename'	=>	post('banktypename'),
            'banknum'	=>	post('banknum'),
            'isdevelop'	=>	post('isdevelop'),
            'bankfid'	=>	post('bankfid'),
            'logo'		=>	post('logo')
        ]);

        $examtype->save();
        return redirect('/examtype/examtypelist')->with('status','保存成功！');
    }
    //删除医考天地分类
    public function delexamtype($id=0)
    {
        var_dump('11');
        if(!empty($id)) {
            ExamBanktypes::where("id",$id)->delete();
            return redirect('/examtype/examtypelist')->with('status','删除成功！');
        }
        else
        {
            return redirect('/examtype/examtypelist')->with('status','删除失败！');
        }
    }

}