<div class="app-form-wrapper">
  <h3><img src="<?php echo assets_url('images/global/app-form-title.png'); ?>" alt="培训需求表"></h3>
  <form name="app-form" method="post" action="<?php echo site_url('app'); ?>" id="theform" onsubmit="return submit_form(this);">
      <input type="hidden" name="web_source" value="" />
      <input type="hidden" name="web_medium" value="" />
      <input type="hidden" name="web_term" value="" />
      <input type="hidden" name="web_content" value="" />
      <input type="hidden" name="web_campaign" value="" />
    <div class="form-group">
      <label for="mobile">培训课程</label>
        <select name="course" id="course" class="bg" style="width:155px; height:25px;">
        <option value="企培日语">日语课程</option>
         <option value="企培汉语">对外汉语课程</option>
                    </select>

    </div>
     <div class="form-group">
      <label for="mobile">地区</label>
        <select name="area" id="area" class="bg" style="width:155px; height:25px;">
        <option value="徐家汇">上海</option>
          <option value="南京">南京</option>
        <option value="无锡">无锡</option>
        <option value="苏州">苏州</option>
        <option value="南通">南通</option>
  <option value="其他校区">其他校区</option>
                    </select>

    </div>
    <div class="form-group">
      <label for="cnname">联系人</label>
      <input type="text" class="form-control" name="cnname" id="cnname">
    </div>
    <div class="form-group">
      <label for="mobile">电话</label>
      <input type="text" class="form-control" name="mobile" id="mobile">
    </div>
     <button type="submit" class="btn  ">提交</button>

  </form>

</div>

<script type="text/javascript">

function submit_form(theform) {
//  if(sys_debug) return true;
//  setHidden(theform);

  if(theform.mobile.value.length < 7) {
    alert('请输入有效的联系电话');
    theform.mobile.focus();
    return false;
  }

  if(theform.cnname.value == '') {
    alert('请输入您的姓名');
    theform.cnname.focus();
    return false;
  }
  
  if(theform.area.value == '') {
    alert('请输入有效的所在区域');
    theform.area.focus();
    return false;
  }
   
    

  return true;  
}
</script>
