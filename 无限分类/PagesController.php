<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
class PagesController extends Controller
{
	/**
	* @msg 选择学校进入
	*/
	public function school()
	{
		//1、使用laravel方法一
		$areas = Areas::with('allChildrenAreas')->find(5);
		$areas_list = $areas->allChildrenAreas;
		
		
		
		
		
		//dd($re[0]['allChildrenAreas']);
		//也可以进行无限极分类但是速度上略有些慢
		
		//2、自己写了一套循环，但感觉速度上没有laravel这个快在优化中
		//$areas = $this->tree();
		//获取当前
		return view('pages.school',compact('areas_list'));
	}
	/**
	* @msg获取分类
	*/
	public function tree($parent_id = 0)
    {
        $rows = Areas::where('parent_id', $parent_id)->orderBy('level','ASC')->get();
        $arr = array();
        if (sizeof($rows) != 0){
            foreach ($rows as $key => $val){
                $val['list'] = $this->tree($val['id']);
                $arr[] = $val;
            }
            return $arr;
        }

    }
	//将省市转换成简称
	public function provinceForShort($province){

		switch ($province)
		{
			case "北京市":
				return "京";
				break;
			case "天津市":
				return "津";
				break;
			case "重庆市":
				 return "渝";
				 break;
			 case "上海市":
				return "沪";
				break;
			case "河北省":
				return "冀";
				break;
			case "山西省":
				 return "晋";
				 break;
			case "辽宁省":
				return "辽";
				break;
			case "吉林省":
				return "吉";
				break;
			case "黑龙江省":
				 return "黑";
				 break;
			case "江苏省":
				return "苏";
				break;
			case "浙江省":
				return "浙";
				break;
			case "安徽省":
				 return "皖";
				 break;
			case "福建省":
				return "闽";
				break;
			case "江西省":
				return "赣";
				break;
			case "山东省":
				 return "鲁";
				 break;
			case "河南省":
				return "豫";
				break;
			case "湖北省":
				return "鄂";
				break;
			case "湖南省":
				 return "湘";
				 break;
			case "广东省":
				return "粤";
				break;
			case "海南省":
				return "琼";
				break;
			case "四川省":
				 return "川/蜀";
				 break;
			case "贵州省":
				return "黔/贵";
				break;
			case "云南省":
				return "云/滇";
				break;
			case "陕西省":
				 return "陕/秦";
				 break;
			case "甘肃省":
				 return "甘/陇";
				 break;
			case "青海省":
				return "青";
				break;
			case "台湾省":
				return "台";
				break;
			case "内蒙古自治区":
				 return "内蒙古";
				 break;
			case "广西壮族自治区":
				return "桂";
				break;
			case "宁夏回族自治区":
				return "宁";
				break;
			case "新疆维吾尔自治区":
				 return "新";
				 break;
			case "西藏自治区":
				return "藏";
				break;
			case "香港特别行政区":
				return "港";
				break;
			case "澳门特别行政区":
				 return "澳";
				 break;
			default:
				 return "";
		}
	}		
}
