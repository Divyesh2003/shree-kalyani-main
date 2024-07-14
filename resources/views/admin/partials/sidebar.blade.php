@php
use App\Models\Role;
$role = auth()->guard('admin')->user()->role; 

$roles = Role::where('id',$role)->first();
// dd($roles);
@endphp
  <!-- Menu -->
  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
      <div class="app-brand demo">
          <a href="{{ route('admin.dashboard')}}" class="app-brand-link">
              <img src="{{ asset('assets/images/logo.jpg')}}" width="64px" alt="">
               <span class="ms-5" style="
               font-size: 20px;
               color: #da5e5e;font-weight:700;
           ">{{ $roles->name }}</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
      </div>
      <div class="menu-inner-shadow"></div>
      <ul class="menu-inner py-1 ps ps--active-y">
          <!-- Dashboards -->
        <!-- Apps -->
        <li class="menu-item">
          <a href="{{ route('admin.dashboard')}}"  class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Email">Dashboard</div>
          </a>
        </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              {{-- <i class="menu-icon tf-icons bx bx-cube-alt"></i> --}}
              <i class='menu-icon   bx bx-cart-add'></i> 
              <div data-i18n="Misc">Master</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('admin.category.index')}}" class="menu-link">
                  <div data-i18n="Error">Category</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('admin.product.index')}}" class="menu-link">
                  <div data-i18n="Under Maintenance">Product</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              {{-- <i class="menu-icon tf-icons bx bx-cube-alt"></i> --}}
              <i class='menu-icon bx bxl-blogger'></i>
              <div data-i18n="Misc">CMS</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('admin.blog.category.index')}}" class="menu-link">
                  <div data-i18n="Error">Blog Category</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('admin.blog.index')}}" class="menu-link">
                  <div data-i18n="Under Maintenance">Blog</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              {{-- <i class="menu-icon tf-icons bx bx-cube-alt"></i> --}}
              <i class='menu-icon bx bx-user'></i>
              <div data-i18n="Misc">User</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('admin.supllier.index')}}" class="menu-link">
                  <div data-i18n="Error">Supplier</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('admin.user.index')}}" class="menu-link">
                  <div data-i18n="Error">User</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('admin.user.role.index')}}" class="menu-link">
                  <div data-i18n="Under Maintenance">User Role</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('admin.user.permission.index')}}" class="menu-link">
                  <div data-i18n="Under Maintenance">User Permission</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.expense.index') }}"  class="menu-link">
              <i class='menu-icon bx bxs-bank' ></i>
              <div data-i18n="Email">Expenses</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.calculator')}}"  class="menu-link">
              <i class='menu-icon bx bxs-calculator' ></i>
              <div data-i18n="Email">Calculator</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.inquiry.index') }}"  class="menu-link">
              <i class='menu-icon bx bx-message-rounded-dots' ></i>
              <div data-i18n="Email">Inquiry</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.purchase.index') }}"  class="menu-link">
              <i class='menu-icon bx bx-message-rounded-dots' ></i>
              <div data-i18n="Email">Purchase</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class='menu-icon bx bxs-cart-add' ></i>
              <div data-i18n="Misc">Order</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('admin.order.index')}}" class="menu-link">
                  <div data-i18n="Error">Order</div>
                </a>
              </li>
              <li class="menu-item">
                {{-- <a href="{{ route('admin.user.role.index')}}" class="menu-link">
                  <div data-i18n="Under Maintenance">Invoice</div>
                </a> --}}
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class='menu-icon bx bx-cog' ></i>
              <div data-i18n="Misc">Setting</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('admin.setting.profile')}}" class="menu-link">
                  <div data-i18n="Error">Profile</div>
                </a>
              </li> 
              <li class="menu-item">    
                <a href="{{ route('admin.country.index')}}" class="menu-link">
                  <div data-i18n="Under Maintenance">Country</div>
                </a>
              </li>
              <li class="menu-item">    
                <a href="{{ route('admin.state.index')}}" class="menu-link">
                  <div data-i18n="Under Maintenance">State</div>
                </a>
              </li>
              <li class="menu-item">    
                <a href="{{ route('admin.suscribe.index')}}" class="menu-link">
                  <div data-i18n="Under Maintenance">Suscribe</div>
                </a>
              </li>
            </ul>
          </li>
            </ul>
          </li>
      </ul>
  </aside>
  <!-- / Menu -->
