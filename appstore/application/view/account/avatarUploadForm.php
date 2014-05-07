<div class="row">
    <div class="small-12-column">
        <form name="avatarUploadForm" enctype="multipart/form-data" method="post" action="<?php echo URL ?>/account/updateavatar">
            <div>
                <!-- put avatar restrictions here -->
            </div>
            <div>
                <label for="uploadAvatarImage">Item image: </label>
                <input type="file" name="uploadAvatarImage" />
            </div>
            <div>
            	<button type="submit" id="btnAvatarUploadSubmit">Submit</button>
            	<button type="cancel" id="btnAvatarUploadCancel">Cancel</button>
            </div>
        </form>
    </div>
</div>