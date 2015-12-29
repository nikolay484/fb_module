<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-helloworld" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-fb_like" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textarea-fb_like_facebook_page_url"><?php echo $entry_fb_url; ?></label>
            <div class="col-sm-10">
              <textarea name="fb_like_facebook_page_url" cols="40" rows="5" placeholder="<?php echo $entry_fb_url; ?>"><?php echo $fb_like_facebook_page_url; ?></textarea>
              <?php if ($error_code) { ?>
              <div class="text-danger"><?php echo $error_code; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textarea-fb_like_facebook_page_width"><?php echo $entry_fb_width; ?></label>
            <div class="col-sm-10">
              <input type="text" name="fb_like_facebook_page_width" placeholder="<?php echo $entry_fb_width; ?>" value="<?php echo $fb_like_facebook_page_width; ?>"><span>px</span>
              <?php if ($error_code) { ?>
              <div class="text-danger"><?php echo $error_code; ?></div>
              <?php } ?>
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textarea-fb_like_facebook_page_height"><?php echo $entry_fb_height; ?></label>
            <div class="col-sm-10">
              <input type="text" name="fb_like_facebook_page_height" placeholder="<?php echo $entry_fb_height; ?>" value="<?php echo $fb_like_facebook_page_height; ?>"><span>px</span>
              <?php if ($error_code) { ?>
              <div class="text-danger"><?php echo $error_code; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_action; ?></label>
            <div class="col-sm-10">
              <select name="fb_like_facebook_page_action" id="input-status" class="form-control">
                <?php if ($fb_like_facebook_page_action == 'mouseover') { ?>
                <option value="mouseover" selected="selected"><?php echo $text_hover; ?></option>
                <option value="click"><?php echo $text_click; ?></option>
                <?php } else { ?>
                <option value="mouseover"><?php echo $text_hover; ?></option>
                <option value="click" selected="selected"><?php echo $text_click; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>  
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="fb_like_facebook_page_url_status" id="input-status" class="form-control">
                <?php if ($fb_like_facebook_page_url_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>          
        </form>
      </div>
	</div>
  </div>
</div>

<?php echo $footer; ?>