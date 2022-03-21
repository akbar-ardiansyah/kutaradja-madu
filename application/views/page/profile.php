<style>
    .img,
    .profile-img {
        background: #c4c4c4;
        height: 150px;
        width: 150px;
        object-fit: contain;
        border-radius: 10px;
    }
</style>
<!--begin::Profile Personal Information-->
<div class="d-flex row">
    <!--begin::Aside-->
    <div class="col-lg-3 col-sm-12 col-md-12">
        <!--begin::Profile Card-->
        <div class="card card-custom card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::User-->
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                        <span class="symbol symbol-lg-100 symbol-25 symbol-light-success">
                            <span class="symbol-label font-size-h1 font-weight-bold text-capitalize bg-radial-gradient-success"><?php echo substr($this->session->userdata('name'), '0', '1'); ?></span>
                        </span>
                        <i class="symbol-badge bg-success"></i>
                    </div>
                    <div>
                        <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary"><?php echo $this->session->userdata('name'); ?></a>
                        <a href="#" class="text-muted text-hover-primary"><?php echo $this->session->userdata('email'); ?></a>

                    </div>
                </div>
                <!--end::User-->
                <!--begin::Contact-->
                <div class="py-9">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2"></span>
                        <a href="#" class="text-muted text-hover-primary"></a>
                    </div>
                </div>
                <!--end::Contact-->



                <!--begin::Nav-->
                <div class="navi navi-bold  navi-link-rounded">
                    <div class="navi-item mb-2">
                        <a class="navi-link py-4 tablinks active" onclick="tabOpen(event, 'ProfileOverview')">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Profile</span>
                        </a>
                    </div>

                    <div class="navi-item mb-2">
                        <a class="navi-link py-4 tablinks " onclick="tabOpen(event, 'PersonalInformation')">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Personal Information</span>
                        </a>
                    </div>

                    <!-- <div class="navi-item mb-2">
                        <a class="navi-link py-4 tablinks" onclick="tabOpen(event, 'AccountInformation')">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                            <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                        </g>
                                    </svg>

                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Account Information</span>
                        </a>
                    </div> -->

                    <div class="navi-item mb-2">
                        <a class="navi-link py-4 tablinks" onclick="tabOpen(event, 'ChangePassword')">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
                                            <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
                                            <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Ubah Password</span>
                            <span class="navi-label">
                                <!-- <span class="label label-light-danger label-rounded font-weight-bold">5</span> -->
                            </span>
                        </a>
                    </div>

                </div>
                <!--end::Nav-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Profile Card-->
    </div>
    <!--end::Aside-->




    <div class="col-lg-9 col-sm-12 col-md-12 mt-3">
        <!--begin::Content ProfileOverview-->
        <div class="card card-custom card-stretch tabcontent" id="ProfileOverview">
            <!--begin::Header-->
            <div class=" card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Informasi Pribadi</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Terakhir di update <small class="text-primary"><?= tgl_indo(substr($this->session->userdata("update_at"), '0', '10')); ?></small></span>
                </div>
            </div>
            <div class="row m-4">
                <div class="col-6">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="profile-img">
                                <img alt="Pic" class="img-fluid img" src="<?= base_url(); ?>assets/upload/user/<?php echo $this->session->userdata('ava'); ?>" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7 pt-4">
                            <!-- <h4><?php echo $this->session->userdata("nama"); ?></h4> -->
                            <h4><i class="flaticon2-correct kt-font-success"></i> <?php echo $this->session->userdata("name"); ?></h4>
                            <span><i class="flaticon2-email kt-font-info mt-2"></i> <?php echo $this->session->userdata("email"); ?></span><br>
                            <span><i class="flaticon2-group kt-font-info  mt-2"></i> Joined <?= substr($this->session->userdata("created_at"), '0', '4'); ?></span><br>
                            <!-- <span><i class="fas fa-landmark kt-font-info mt-2"></i> Dinas Kesehatan</span><br> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--begin::Content PersonalInformation-->
        <div class="card card-custom card-stretch tabcontent" id="PersonalInformation" style="display: none;">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Terakhir di update <small class="text-primary"><?= tgl_indo(substr($this->session->userdata("update_at"), '0', '10')); ?></small></span>
                </div>
                <div class="card-toolbar">
                    <button class="btn btn-success mr-2 btn_actions_form">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Batal</button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form action="#" method="POST" id="form_users" enctype="multipart/form-data">
                <input type="hidden" id="id_user" name="id_user">
                <!--begin::Body-->
                <div class="card-body">
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mb-6">Personal Info</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(<?= base_url(); ?>assets/upload/user/<?php echo $this->session->userdata('ava'); ?>)">
                                <div class="image-input-wrapper" style="background-image: url<?= base_url(); ?>assets/upload/user/default.png)">
                                </div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" id="avatar" accept=".png, .jpg, .jpeg" />
                                    <!-- <input type="hidden" name="profile_avatar_remove" /> -->
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Batal">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Hapus avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Nama</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="nama" value="<?php echo $this->session->userdata('name'); ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Username</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-at"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="username" value="<?php echo $this->session->userdata('username'); ?>" placeholder="Username" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mt-10 mb-6">Informasi Kontak </h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="email" value="<?php echo $this->session->userdata('email'); ?>" readonly />
                        </div>
                    </div>

                </div>
                <!--end::Body-->
            </form>
            <!--end::Form-->
        </div>

        <!--begin::Content ChangePassword-->
        <!--begin::Card-->
        <div class="card card-custom  tabcontent" id="ChangePassword" style="display: none;">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Ubah Password</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Ubah password akun anda</span>
                </div>
                <!-- <div class="card-toolbar">

            </div> -->
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form class="form" method="POST" id="form_change_password">
                <input type="hidden" name="id_user" id="id_user" value="<?= $this->session->userdata('id_users'); ?>">
                <div class="card-body">
                    <!--end::Alert-->
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert ">Password saat ini</label>
                        <div class="input-icon input-icon-right col-lg-9 col-xl-6" id="show_hide_password">
                            <input class="form-control" type="password" name="currentPassword" id="currentPassword" class="form-control form-control-solid" placeholder="Password saat ini">
                            <span class="pr-4 "><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert ">Password baru</label>
                        <div class="input-icon input-icon-right col-lg-9 col-xl-6" id="show_hide_password_1">
                            <input class="form-control" type="password" name="newPassword" id="newPassword" class="form-control form-control-solid" placeholder="Password saat ini">
                            <span class="pr-4 "><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert ">Konfirmasi password</label>
                        <div class="input-icon input-icon-right col-lg-9 col-xl-6" id="show_hide_password_2">
                            <input class="form-control" type="password" name="verifyPassword" id="verifyPassword" class="form-control form-control-solid" placeholder="Password saat ini">
                            <span class="pr-4 "><a><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success mr-2 btn_actions_form_update_pass"><i class="la la-cogs kt-font-light"></i> Simpan</button>
                    <button type="reset" class="btn btn-secondary">Batal</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
    <!--end::Content-->
</div>
<!--end::Profile Personal Information-->