<!-- Modal TO CHANGE PASSWORD -->
<div class="modal fade" id="changePass" tabindex="-1" aria-labelledby="changePassLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="changePassLabel">Change Pass</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form action="" method = "POST" id = "passChange">

                        <div class="mb-3">
                            <label for="oldPassword" class="form-label">Old Password</label>
                            <input type="password" class="form-control" id="oldPassword">
                            <span id = "old-error"></span>
                        </div>

                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Enter New Password</label>
                            <input type  = "password" class="form-control" id="newPassword" />
                            <span id = "new-error"></span>

                        </div>

                        <div class="mb-3">
                            <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
                            <input type  = "password" class="form-control" id="confirmNewPassword"/>
                            <span id = "newConf-error"></span>

                        </div>

                        <span id = "checkOld-error"></span>
                        <span id = "checkNew-error"></span>

                    </form>

                    <div class="alert alert-success" id="success-alert" style = "text-align:center"></div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary changeP">Save changes</button>
                </div>
                
            </div>
        </div>
    </div>
