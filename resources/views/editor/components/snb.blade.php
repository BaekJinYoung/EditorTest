<div class="header-wrap">
    <img src="{{ asset('') }}" alt="" class="header-logo">

    <div class="menu-wrap row-group">
        <div class="gnb">
            <div class="gnb-item">
                <div>

                </div>
            </div>
            <div class="gnb-item">
                <div class="item-default">


                </div>
                <div class="sub-gnb row-group">

                </div>
                <div class="sub-gnb row-group">

                </div>
            </div>
            <div class="gnb-item">
                <div>

                </div>
            </div>
            <div class="gnb-item">
                <div>
                    <a href="" class="item-default">
                    </a>
                </div>
            </div>
        </div>

        <div class="header-btm">
            <div class="coworkerweb_logo_Wrap">
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="xi-log-out"></i>
                로그아웃
            </button>
        </form>
    </div>
</div>
