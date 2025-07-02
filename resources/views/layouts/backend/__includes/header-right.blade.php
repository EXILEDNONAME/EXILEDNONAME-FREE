<div class="topbar">

  @include('layouts.backend.__includes.components.topbar.search')
  @include('layouts.backend.__includes.components.topbar.notifications')
  @include('layouts.backend.__includes.components.topbar.quick-actions')
  @include('layouts.backend.__includes.components.topbar.cart')
  @include('layouts.backend.__includes.components.topbar.chat')

      <div class="dropdown">
        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
          <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
            <img class="h-20px w-20px rounded-sm" src="/assets/backend/media/svg/flags/226-united-states.svg" alt="" />
          </div>
        </div>
        <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
          <ul class="navi navi-hover py-4">
            <li class="navi-item">
              <a href="#" class="navi-link">
                <span class="symbol symbol-20 mr-3">
                  <img src="/assets/backend/media/svg/flags/226-united-states.svg" alt="" />
                </span>
                <span class="navi-text">English</span>
              </a>
            </li>
            <li class="navi-item active">
              <a href="#" class="navi-link">
                <span class="symbol symbol-20 mr-3">
                  <img src="/assets/backend/media/svg/flags/128-spain.svg" alt="" />
                </span>
                <span class="navi-text">Spanish</span>
              </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="navi-item">
              <a href="#" class="navi-link">
                <span class="symbol symbol-20 mr-3">
                  <img src="/assets/backend/media/svg/flags/162-germany.svg" alt="" />
                </span>
                <span class="navi-text">German</span>
              </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="navi-item">
              <a href="#" class="navi-link">
                <span class="symbol symbol-20 mr-3">
                  <img src="/assets/backend/media/svg/flags/063-japan.svg" alt="" />
                </span>
                <span class="navi-text">Japanese</span>
              </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="navi-item">
              <a href="#" class="navi-link">
                <span class="symbol symbol-20 mr-3">
                  <img src="/assets/backend/media/svg/flags/195-france.svg" alt="" />
                </span>
                <span class="navi-text">French</span>
              </a>
            </li>
            <!--end::Item-->
          </ul>
          <!--end::Nav-->
        </div>
        <!--end::Dropdown-->
      </div>
      <!--end::Languages-->
      <!--begin::User-->
      <div class="topbar-item">
        <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
          <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
          <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Sean</span>
          <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
            <span class="symbol-label font-size-h5 font-weight-bold">S</span>
          </span>
        </div>
      </div>
      <!--end::User-->
    </div>
