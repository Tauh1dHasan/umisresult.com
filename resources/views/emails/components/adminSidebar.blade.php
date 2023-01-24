<div class="left-side-menu mbda-sidebar">
    <div class="slimscroll-menu">
        <!--- Side menu -->
        <div id="sidebar-menu">

            <a class="navbar-customer" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('public/frontend-assets/images/logo.png') }}" class="logo-admin" alt="logo">
            </a>

            <ul class="metismenu" id="side-menu">
                <!-- Link - My Profile -->
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="">
                        <i class="fe-user"></i>
                        <span>ড্যাশবোর্ড </span>
                    </a>
                </li>
                <!-- Users - Settings Modules -->
                <li>
                    <a href="javascript:void(0);" class="">
                        <i class="fa fa-users"></i>
                        <span> Users </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li>
                            <a href="{{ route('users.create') }}">Create new user</a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}">ইউজার লিস্ট</a>
                        </li>
                    </ul>
                </li>



                <!-- Link - Account settings Modules -->
                <li>
                    <a href="{{ route('accounts.index') }}" class="">
                        <i class="ti-layers-alt"></i>
                        <span>Accounts </span>
                    </a>
                </li>



                <!-- Link - Payway Settings Modules -->
                <li>
                    <a href="javascript: void(0);" class="">
                        <i class="fe-message-square"></i>
                        <span> Payway </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li>
                            <a href="{{ route('payway.index') }}">Direct Debit List</a>
                        </li>
                    </ul>
                </li>



                <!-- Link - Ticketing Settings Modules -->
                <li>
                    <a href="javascript: void(0);" class="">
                        <i class="fe-message-square"></i>
                        <span> SecureMail </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.tickets') }}">All</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.tickets.pending') }}">অসম্পূর্ণ</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.tickets.answered') }}">Answered</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.tickets.closed') }}">Closed</a>
                        </li>
                    </ul>
                </li>


                <!-- Link - Requests Settings Modules -->
                <li>
                    <a href="javascript: void(0);" class="">
                        <i class="fas fa-money-check-alt"></i>
                        <span> Requests </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li>
                            <a href="{{ route('payment.request') }}">Payment</a>
                        </li>

                        <li>
                            <a href="{{ route('withdrawal.request') }}">Withdrawal</a>
                        </li>

                        <li>
                            <a href="{{ route('profile.update.pending') }}">প্রোফাইল Update</a>
                        </li>
                        <li>
                            <a href="{{ route('statement.download.request') }}">Statement</a>
                        </li>
                    </ul>
                </li>

                <!-- Link - Report Modules -->
                @if ( auth()->user()->user_type === 1 )
                    <li>
                        <a href="javascript: void(0);" class="">
                            <i class="fas fa-chart-bar"></i>
                            <span> Reports </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level nav" aria-expanded="false">
                            <li>
                                <a href="{{ route('reports.customers') }}">Customers</a>
                            </li>
                            <li>
                                <a href="{{ route('reports.index') }}">Accounts</a>
                            </li>



                            <li>
                                <a href="{{ route('reports.transactions') }}">Transactions</a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Link - Data Migrations Modules -->
                @if ( auth()->user()->user_type === 1 )
                    <li>
                        <a href="javascript: void(0);" class="">
                            <i class="fe-database"></i>
                            <span> Migrations </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level nav" aria-expanded="false">

                            <li>
                                <a href="{{ route('user.migration') }}">Users</a>
                            </li>

                            <li>
                                <a href="{{ route('account.migration') }}">Accounts</a>
                            </li>

                            <li>
                                <a href="{{ route('migration.index') }}">Transactions</a>
                            </li>
                        </ul>

                    </li>
                @endif

                <!-- Link - Data Migrations Modules -->

                @if ( auth()->user()->user_type === 1 )
                    <li>
                        <a href="javascript: void(0);" class="">
                            <i class="fe-alert-triangle"></i>
                            <span> Quarantine </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level nav" aria-expanded="false">

                            <li>
                                <a href="{{ route('quarantine.users') }}">ইউজার লিস্ট</a>
                            </li>

                            <li>
                                <a href="{{ route('quarantine.accounts') }}">Account List</a>
                            </li>

                            <li>
                                <a href="{{ route('quarantine.secure.mail') }}">SecureMail List</a>
                            </li>

                        </ul>

                    </li>

                @endif



               <!-- Link - Requests Settings Modules -->
               @if ( auth()->user()->user_type === 1 )
                    <li>
                        <a href="javascript: void(0);" class="">
                            <i class="fe-settings"></i>
                            <span> Settings </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level nav" aria-expanded="false">
                            <li>
                                <a href="{{ route('account-types.index') }}">Account টাইপ</a>
                            </li>

                            <li>
                                <a href="{{ route('transaction-types.index') }}">Transaction টাইপ</a>
                            </li>

                            <li>
                                <a href="{{ route('transaction-category.index') }}">Transaction Category</a>
                            </li>

                            <li>
                                <a href="{{ route('state.index') }}">State</a>
                            </li>

                            <li>
                                <a href="{{ route('driver-state.index') }}">Driver Licence State</a>
                            </li>

                            <li>
                                <a href="{{ url('super-admin/log/user-activity') }}">Activity Log</a>
                            </li>



                        </ul>

                    </li>
                @endif
                <li>
                    @guest
                        <a href="#"  class="dropdown-item notify-item">লগ-আউট</a>
                    @else
                        <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fe-log-out"></i>
                            <span>লগ-আউট</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>

<style>
    .navbar-customer{
        display: block;
        width: 100%;
        text-align: center;
        padding: 23px 0 35px;
    }
    .navbar-customer .logo-admin{
        width: 205px;
        text-align: center;
    }
</style>
