<div class="search-popup">
    <div class="search-popup__overlay custom-cursor__overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div><!-- /.search-popup__overlay -->
    <div class="search-popup__inner">
        <form action="{{route('search-results')}}" id="form_search" method="POST" class="search-popup__form">
            @csrf
            <input type="text" name="search" placeholder="Введіть текс пошуку ..." required>
            <button type="submit"><i class="kipso-icon-magnifying-glass"></i></button>
            <input type="hidden" id="cur_page" name="cur_page" value="1">
        </form>
    </div><!-- /.search-popup__inner -->
</div><!-- /.search-popup -->
