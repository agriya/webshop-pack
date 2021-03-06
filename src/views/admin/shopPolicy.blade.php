@if (isset($success_message) && $success_message != "")
    <div class="alert alert-success">{{	$success_message }}</div>
@endif
{{ Form::model($shop_details, ['url' => URL::to(Config::get('webshoppack::shop_uri').'/users/shop-details'),'method' => 'post','id' => 'shoppolicy_frm', 'class' => 'form-horizontal']) }}
	<?php
		$shop_name_msg = str_replace('VAR_MIN', Config::get('shop.shopname_min_length'), trans("webshoppack::shopDetails.characters_min_max_msg"));
		$shop_name_msg = str_replace('VAR_MAX', Config::get('shop.shopname_max_length'), $shop_name_msg);
		$shop_name_label = trans("webshoppack::shopDetails.shop_name")." ".$shop_name_msg;

		$shop_slogan_msg = str_replace('VAR_MIN', Config::get('shop.shopslogan_min_length'), trans("webshoppack::shopDetails.characters_min_max_msg"));
		$shop_slogan_msg = str_replace('VAR_MAX', Config::get('shop.shopslogan_max_length'), $shop_slogan_msg);
		$shop_slogan_label = trans("webshoppack::shopDetails.shop_slogan")." ".$shop_slogan_msg;
	?>
	{{ Form::hidden('submit_form', "update_policy", array("name" => "submit_form", "id" => "submit_form"))}}
	<fieldset class="col-lg-10">
		<div class="form-group {{{ $errors->has('shop_name') ? 'error' : '' }}}">
			{{ Form::label('shop_name', $shop_name_label, array('class' => 'col-lg-3 control-label required-icon')) }}
			<div class="col-lg-4">
				{{ Form::text('shop_name', Input::get('shop_name'), array('class' => 'form-control', 'maxlength' =>Config::get('shop.shopname_max_length') )); }}
				<label class="error">{{{ $errors->first('shop_name') }}}</label>
			</div>
		</div>

		<div class="form-group {{{ $errors->has('url_slug') ? 'error' : '' }}}">
			{{ Form::label('url_slug', trans("webshoppack::shopDetails.url_slug"), array('class' => 'col-lg-3 control-label required-icon')) }}
			<div class="col-lg-4">
				{{ Form::text('url_slug', Input::get('url_slug'), array('class' => 'form-control')); }}
				<label class="error">{{{ $errors->first('url_slug') }}}</label>
			</div>
		</div>

		<div class="form-group {{{ $errors->has('shop_slogan') ? 'error' : '' }}}">
			{{ Form::label('shop_slogan', $shop_slogan_label, array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-4">
				{{ Form::text('shop_slogan', Input::get('shop_slogan'), array('class' => 'form-control', 'maxlength' =>Config::get('shop.shopslogan_max_length'))); }}
				<label class="error">{{{ $errors->first('shop_slogan') }}}</label>
			</div>
		</div>

		<div class="form-group {{{ $errors->has('shop_desc') ? 'error' : '' }}}">
			{{ Form::label('shop_desc', trans("webshoppack::shopDetails.shop_description"), array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-7">
				{{  Form::textarea('shop_desc', Input::get('shop_desc'), array('class' => 'form-control')); }}
				<div id="shop_desc_count" class="form-info"></div>
				<label class="error">{{{ $errors->first('shop_desc') }}}</label>
			</div>
		</div>

		<div class="form-group {{{ $errors->has('shop_contactinfo') ? 'error' : '' }}}">
			<label class="col-lg-3 control-label">
				{{ Form::label('shop_contactinfo', trans("webshoppack::shopDetails.shop_contact_info"), array('class' => '')) }}
				<span class="text-muted">({{ trans("webshoppack::shopDetails.shop_contact_info_help") }})</span>
			</label>
			<div class="col-lg-7">
				{{  Form::textarea('shop_contactinfo', Input::get('shop_contactinfo'), array('class' => 'form-control')); }}
				<div id="shop_contactinfo_count" class="form-info"></div>
				<label class="error">{{{ $errors->first('shop_contactinfo') }}}</label>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-offset-3 col-lg-10">
				<button type="button" name="update_policy" class="btn btn-success" id="update_policy" value="update_policy" onclick="javascript:doSubmit('shoppolicy_frm', 'shop_details');">{{trans("webshoppack::common.update")}}</button>
			</div>
		</div>
	</fieldset>
{{ Form::close() }}