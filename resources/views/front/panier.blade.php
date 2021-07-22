<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Déco-Pierre, Réinventez votre vie">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Panier</title>
      <link rel="stylesheet" href="{{ asset('css/nicepage.css') }}" media="screen">
      <link rel="stylesheet" href="{{ asset('css/Panier.css') }} " media="screen">
      <script class="u-script" type="text/javascript" src="{{  asset('js/jquery.js') }}" defer=""></script>
      <script class="u-script" type="text/javascript" src=" {{ asset('js/nicepage.js') }}" defer=""></script>
    <meta name="generator" content="Nicepage 3.19.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">





    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#a68053">
    <meta property="og:title" content="Panier">
    <meta property="og:type" content="website">
      <style>
          input::-webkit-outer-spin-button,
          input::-webkit-inner-spin-button {
              -webkit-appearance: none;
              margin: 0;
          }

          /* Firefox */
          input[type=number] {
              -moz-appearance: textfield;
          }
      </style>
  </head>
  <body class="u-body u-overlap u-overlap-contrast u-overlap-transparent"><header class="u-clearfix u-custom-color-4 u-header u-sticky u-header" id="sec-6cd2"><div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
          <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
              <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                  <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                      <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
                              </symbol>
                          </defs></svg>
                  </a>
              </div>
              <div class="u-custom-menu u-nav-container">
                  <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-3-light-1 u-text-hover-palette-2-light-2 u-text-white" href="/accueil" style="padding: 10px 20px;">Accueil</a>
                      </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-3-light-1 u-text-hover-palette-2-light-2 u-text-white" href="/produitsf" data-page-id="18964500" style="padding: 10px 20px;">Produits</a>
                      </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-3-light-1 u-text-hover-palette-2-light-2 u-text-white" href="/panier" data-page-id="18964500" style="padding: 10px 20px;">
                         <span class="u-icon u-text-palette-2-base"><svg class="u-svg-content" viewBox="0 0 511.334 511.334" style="width: 1em; height: 1em;">
                                        <path d="m506.887 114.74c-3.979-5.097-10.086-8.076-16.553-8.076h-399.808l-5.943-66.207c-.972-10.827-10.046-19.123-20.916-19.123h-42.667c-11.598 0-21 9.402-21 21s9.402 21 21 21h23.468l23.018 256.439c.005.302-.01.599.007.903.047.806.152 1.594.286 2.37l.842 9.376c.016.177.034.354.055.529 2.552 22.11 13.851 41.267 30.19 54.21-8.466 10.812-13.532 24.407-13.532 39.172 0 35.106 28.561 63.667 63.666 63.667 35.106 0 63.667-28.561 63.667-63.667 0-7.605-1.345-14.9-3.801-21.667h114.936c-2.457 6.767-3.801 14.062-3.801 21.667 0 35.106 28.561 63.667 63.667 63.667s63.667-28.561 63.667-63.667-28.561-63.667-63.667-63.667h-234.526c-15.952 0-29.853-9.624-35.853-23.646l335.608-19.724c9.162-.538 16.914-6.966 19.141-15.87l42.67-170.67c1.567-6.272.158-12.918-3.821-18.016z"></path>

                                    </svg>

                             <img></span>
                              <span class="num">{{session('cart') ? count(session('cart')) : 0}}</span>

                          </a>
                      </li></ul>
              </div>
              <div class="u-custom-menu u-nav-container-collapse">
                  <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                      <div class="u-sidenav-overflow">
                          <div class="u-menu-close"></div>
                          <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                              <li class="u-nav-item"><a class="u-button-style u-nav-link" href="/accueil" style="padding: 10px 20px;">Accueil</a>
                              </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="/produitsf" data-page-id="18964500" style="padding: 10px 20px;">Produits</a>
                              </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="/panier" data-page-id="18964500" style="padding: 10px 20px;">
                                                  <span class="u-icon u-text-palette-2-base"><svg class="u-svg-content" viewBox="0 0 511.334 511.334" style="width: 1em; height: 1em;">
                                        <path d="m506.887 114.74c-3.979-5.097-10.086-8.076-16.553-8.076h-399.808l-5.943-66.207c-.972-10.827-10.046-19.123-20.916-19.123h-42.667c-11.598 0-21 9.402-21 21s9.402 21 21 21h23.468l23.018 256.439c.005.302-.01.599.007.903.047.806.152 1.594.286 2.37l.842 9.376c.016.177.034.354.055.529 2.552 22.11 13.851 41.267 30.19 54.21-8.466 10.812-13.532 24.407-13.532 39.172 0 35.106 28.561 63.667 63.666 63.667 35.106 0 63.667-28.561 63.667-63.667 0-7.605-1.345-14.9-3.801-21.667h114.936c-2.457 6.767-3.801 14.062-3.801 21.667 0 35.106 28.561 63.667 63.667 63.667s63.667-28.561 63.667-63.667-28.561-63.667-63.667-63.667h-234.526c-15.952 0-29.853-9.624-35.853-23.646l335.608-19.724c9.162-.538 16.914-6.966 19.141-15.87l42.67-170.67c1.567-6.272.158-12.918-3.821-18.016z"></path>

                                    </svg>

                             <img></span>
                                      <span class="numl">{{session('cart') ? count(session('cart')) : 0}}</span></a>
                              </li></ul>
                      </div>
                  </div>
                  <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
              </div>
          </nav>
          <a class="u-btn u-button-link u-button-style u-custom-font u-font-arial u-none u-text-body-alt-color u-btn-1" href="/accueil" data-page-id="18964500">Déco-Pierre</a>
      </div></header>
    <section class="u-align-center u-clearfix u-image u-shading u-section-1" src="" data-image-width="2794" data-image-height="3834" id="sec-5359">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <h1 class="u-custom-font u-font-arial u-text u-text-palette-3-light-2 u-title u-text-1" data-animation-name="pulse" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">Déco-Pierre</h1>
        <p class="u-align-center u-custom-font u-font-merriweather u-text u-text-palette-3-light-2 u-text-2">De la pierre...de la vraie</p>
      </div>
    </section>
    <section class="u-clearfix u-valign-bottom u-white u-section-2" id="sec-1f0b">
      <div class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-container-style u-expanded-width u-group u-shape-rectangle u-group-1">
        <div class="u-container-layout u-container-layout-1">
          <h3 class="u-align-center u-text u-text-1"><b>
              <span class="u-text-palette-3-light-2">PAN</span></b>IER
          </h3>
        </div>
      </div>
    </section>
  <?php $total = 0 ;
  $pour = session('coupon')? session('coupon')->pourcentage :  0;
  $details =""?>
  @if(session('cart'))
      @foreach(session('cart') as $id => $details)
          <?php
              if ($details['know']==1)
          $total += $details['prix'] * $details['quantite'] ;
          ?>

    <section class="u-align-center u-clearfix u-section-3" data-total="{{ $details['prix']*$details['quantite'] }}" data-unitaire="{{ $details['prix'] }}" data-know="{{ $details['know'] }}">
      <div class="u-clearfix u-sheet u-sheet-1">
          <a href="#" class="remove-from-cart"  data-id="{{ $id }}"><h4 class="u-text u-text-palette-3-dark-1 u-text-1">X</h4></a>
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout" style="">
            <div class="u-layout-row" style="">
              <div class="u-align-center u-container-style u-layout-cell u-left-cell u-size-23 u-size-xs-60 u-layout-cell-1" src="">
                <div class="u-container-layout u-container-layout-1" src="">
                  <img class="u-absolute-hcenter u-expanded-height u-image u-image-1" src="{{ asset('images/'.  $details['images'][0]->image_name) }}" data-image-width="960" data-image-height="720">
                </div>
              </div>
              <div class="u-align-center u-container-style u-layout-cell u-right-cell u-size-37 u-size-xs-60 u-white u-layout-cell-2" src="">
                <div class="u-border-1 u-border-palette-3-light-2 u-container-layout u-container-layout-2">
                  <h5 class="u-text u-text-2">{{ $details['nom'] }}</h5>
                  <div class="u-align-center-xs u-clearfix u-custom-html u-custom-html-1">
                    <select style="color : #907d59; border: #907d59 " class="schoice" data-id="{{ $id }}" >
                      <option value="Non" {{$details['know']==0 ?'selected' : '' }} >Non</option>
                      <option value="Oui" {{$details['know']==1 ?'selected' : '' }} ">Oui </option>
                    </select>
                  </div>
                  <p class="u-align-center-lg u-align-center-md u-align-center-xl u-text u-text-3">Saviez-vous combien de métre carré vous en aviez besoin?</p>
                  <div class="u-clearfix u-custom-html u-custom-html-2">
                    <label for="name-558c" class="u-form-control-hidden u-label">{{ $details['nom'] }}</label>
                    <input value="{{$details['quantite']}}" type="number" id="name-558c" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle update-cart" data-id="{{ $id }}" data-prix="{{ $details['prix'] }}" required="">
                  </div>
                  <h5 class="u-text u-text-4">X {{ round($details['prix']) }}DT</h5>
                  <h4 class="u-align-center-xs u-text u-text-palette-3-light-1 u-text-5">{{ round($details['prix']*$details['quantite']) }}DT</h4>
                  <p class="u-align-center-sm u-align-center-xs u-text u-text-palette-3-dark-1 u-text-6" style="visibility: hidden">Notre equipe s'occupera des mesures aprés que vous passiez la commande.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endforeach
  @endif

  <section class="u-align-center u-clearfix u-section-4" id="sec-693d">
      <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-text u-text-black u-text-1">Avez-vous un code promo?</p>
        <div class="u-align-center-sm u-align-center-xs u-clearfix u-custom-html u-preserve-proportions u-custom-html-1">
          <label for="name-558c" class="u-form-control-hidden u-label">Name</label>
          <input id="ecoupon" type="text" id="name-558c" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="">
        </div>
        <a id ="coupon" href="https://nicepage.com/k/result-html-templates" class="u-border-none u-btn u-btn-round u-button-style u-palette-3-light-2 u-radius-2 u-btn-1"><span class="u-icon"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068 c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557 l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-.006,0.011-.013,0.018-.019C513.968,262.339,513.943,249.635,506.134,241.843z"></path></svg><img></span>
        </a>
        <h4 class="u-text u-text-palette-3-dark-1 u-text-2">TOTAL</h4>
        <h4 class="u-text u-text-3 " id ="totalp" >0 DT</h4>

          <a href="/ajoutcommande">Finaliser</a>
          <a href="/produitsf" class="u-align-center u-border-none u-btn u-button-style u-grey-5 u-hover-grey-10 u-btn-3">Continuer vos achats</a>
      </div>
    </section>
    <style class="u-overlap-style">.u-overlap:not(.u-sticky-scroll) .u-header {
}</style>

    <footer class="u-border-1 u-border-palette-3-light-1 u-clearfix u-footer u-palette-3-light-3" id="sec-ae6d"><div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-center u-social-icons u-spacing-26 u-social-icons-1">
          <a class="u-social-url" title="facebook" target="_blank" href=""><span class="u-icon u-icon-circle u-social-facebook u-social-icon u-text-palette-3-dark-1 u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 24 24" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0f77"></use></svg><svg class="u-svg-content" viewBox="0 0 24 24" id="svg-0f77"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"></path></svg></span>
          </a>
          <a class="u-social-url" title="instagram" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-instagram u-text-palette-3-dark-1 u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 511 511.9" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-a0c9"></use></svg><svg class="u-svg-content" viewBox="0 0 511 511.9" id="svg-a0c9"><path d="m510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5-16.296876-6.300781-34.898438-10.699219-62.097657-11.898438-27.402343-1.300781-36.101562-1.601562-105.601562-1.601562s-78.199219.300781-105.5 1.5c-27.199219 1.199219-45.898438 5.601562-62.097657 11.898438-17.203124 6.5-32.601562 16.5-45.402343 29.601562-13 12.800781-23.097657 28.300781-29.5 45.300781-6.300781 16.300781-10.699219 34.898438-11.898438 62.097657-1.300781 27.402343-1.601562 36.101562-1.601562 105.601562s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438 12.800781 13 28.300781 23.101562 45.300781 29.5 16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5c27.199219-1.199219 45.898438-5.597657 62.097657-11.898438 34.402343-13.300781 61.601562-40.5 74.902343-74.898438 6.296876-16.300781 10.699219-34.902343 11.898438-62.101562 1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876-11.097657-4.101562-21.199219-10.601562-29.398438-19.101562-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5 4.101562-11.101562 10.601562-21.199219 19.203124-29.402343 8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0"></path><path d="m256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.902343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781c47.101562 0 85.300781 38.199219 85.300781 85.300781s-38.199219 85.300781-85.300781 85.300781zm0 0"></path><path d="m423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0"></path></svg></span>
          </a>
          <a class="u-social-url" target="_blank" title="Whatsapp" href=""><span class="u-icon u-icon-circle u-social-icon u-social-whatsapp u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 24 24" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1b0e"></use></svg><svg class="u-svg-content" viewBox="0 0 24 24" id="svg-1b0e"><path d="m17.507 14.307-.009.075c-2.199-1.096-2.429-1.242-2.713-.816-.197.295-.771.964-.944 1.162-.175.195-.349.21-.646.075-.3-.15-1.263-.465-2.403-1.485-.888-.795-1.484-1.77-1.66-2.07-.293-.506.32-.578.878-1.634.1-.21.049-.375-.025-.524-.075-.15-.672-1.62-.922-2.206-.24-.584-.487-.51-.672-.51-.576-.05-.997-.042-1.368.344-1.614 1.774-1.207 3.604.174 5.55 2.714 3.552 4.16 4.206 6.804 5.114.714.227 1.365.195 1.88.121.574-.091 1.767-.721 2.016-1.426.255-.705.255-1.29.18-1.425-.074-.135-.27-.21-.57-.345z"></path><path d="m20.52 3.449c-7.689-7.433-20.414-2.042-20.419 8.444 0 2.096.549 4.14 1.595 5.945l-1.696 6.162 6.335-1.652c7.905 4.27 17.661-1.4 17.665-10.449 0-3.176-1.24-6.165-3.495-8.411zm1.482 8.417c-.006 7.633-8.385 12.4-15.012 8.504l-.36-.214-3.75.975 1.005-3.645-.239-.375c-4.124-6.565.614-15.145 8.426-15.145 2.654 0 5.145 1.035 7.021 2.91 1.875 1.859 2.909 4.35 2.909 6.99z"></path></svg></span>
          </a>
        </div>
        <p class="u-align-center u-custom-font u-font-arial u-text u-text-palette-3-dark-1 u-text-1">decopierre2013@gmail.com<br>+216 29 403 488<br>
        </p>
        <p class="u-align-center u-custom-font u-font-arial u-text u-text-grey-30 u-text-2">Copyright © 2020 Déco-Pierre<br>
        </p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
        <span>Website Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="https://nicepage.com/" target="_blank">
        <span>Website Builder Software</span>
      </a>.
    </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">
      var total = 0 ;
      var nb = JSON.parse("{{ json_encode(session('cart') ? count(session('cart')) : 0) }}");

      function UpdateTotal(){
          total = 0;
          var total_s ="";
          $('.u-section-3').each(function (index){
              var prix_u = Math.round($(this).attr("data-unitaire"));
              var prix_t = parseInt($(this).attr("data-total"));
              var know =   $(this).attr('data-know');
              console.log( prix_u.toString());
              if (know ==0){
                  total_s += " + " + prix_u.toString()+ " DT x m²";

              }else if (know == 1) {
                  total += prix_t ;
              }
          if (total !=0) {
              $("#totalp").html(Math.round(total).toString() + " TD" + total_s);
          }else {
              $("#totalp").html(total_s.replace('+', '') );
          }
          });
          if (total ==0 && total_s === ""){
              $("#totalp").html(' 0 DT');
          }
      }
      UpdateTotal();
      $(".update-cart").on("keyup change", function(e) {
          e.preventDefault();
          var ele = $(this);
          $.ajax({
              url: '{{ url('update-cart') }}',
              method: "patch",
              data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.val()},
              success: function (response) {
                  ele.parent().parent().find('.u-text-5').html(ele.val()*Math.round(ele.attr("data-prix"))+" DT");
                  ele.parent().parent().parent().parent().parent().parent().parent().parent().attr('data-total', ele.val()*ele.attr("data-prix"));
                  UpdateTotal();
              }
          });
      });
      $("#coupon").click(function (e){
          e.preventDefault();
          var code = $("#ecoupon").val();
          $.ajax({
              url: '{{ url('update-coupon') }}',
              method : "patch",
              data: {_token: '{{ csrf_token() }}', code : code},
              success: function (response) {
                   window.location.reload();
              }
          });
      });
      $(".remove-from-cart").click(function (e) {
          e.preventDefault();
          var ele = $(this);

          if(confirm("Vous êtes sûr ?")) {
                  $.ajax({
                      url: '{{ url('remove-from-cart') }}',
                  method: "DELETE",
                  data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                  success: function (response) {
                      ele.parent().parent().hide( 400, function() {
                         ele.parent().parent().remove();
                          UpdateTotal();
                          nb-- ;
                          $('.num').html(nb);
                          $('.numl').html(nb);

                      });
                  }
              });
          }
      });
      $('.schoice').each(function (e){
          if ($(this).val() === "Non") {
              $(this).parent().parent().find('.u-text-6').css('visibility', 'visible');
              $(this).parent().parent().find('.u-custom-html-2').find('.update-cart').prop("disabled", true);
              $(this).parent().parent().find('.u-text-5').hide();
              $(this).parent().parent().parent().parent().parent().parent().parent().parent().attr('data-know', 0);
              UpdateTotal();
          } else if ($(this).val() === "Oui") {
              $(this).parent().parent().find('.u-text-5').show();
              $(this).parent().parent().find('.u-text-6').css('visibility', 'hidden')
              $(this).parent().parent().find('.u-custom-html-2').find('.update-cart').prop("disabled", false);
              $(this).parent().parent().parent().parent().parent().parent().parent().parent().attr('data-know', 1);
              UpdateTotal();
          }
      });
      $('.schoice').change(function (e) {
          if ($(this).val() === "Non") {
              $(this).parent().parent().find('.u-text-6').css('visibility', 'visible');
              $(this).parent().parent().find('.u-custom-html-2').find('.update-cart').prop("disabled", true);
              $(this).parent().parent().find('.u-text-5').hide();
              $(this).parent().parent().parent().parent().parent().parent().parent().parent().attr('data-know', 0);
              UpdateTotal();
          } else if ($(this).val() === "Oui") {
              $(this).parent().parent().find('.u-text-5').show();
              $(this).parent().parent().find('.u-text-6').css('visibility', 'hidden')
              $(this).parent().parent().find('.u-custom-html-2').find('.update-cart').prop("disabled", false);
              $(this).parent().parent().parent().parent().parent().parent().parent().parent().attr('data-know', 1);
              UpdateTotal();
          }
          console.log($(this).parent().parent()
              .parent().parent().parent().parent().parent().parent().attr('data-know'));
          $.ajax({
              url: '{{ url('update-know-cart') }}',
              method: "patch",
              data: {_token: '{{ csrf_token() }}', id: $(this).attr("data-id"),know: $(this)
                      .parent().parent().parent().parent()
                      .parent().parent().parent().parent().attr('data-know')},
              success: function (response) {
                  console.log(response.know);

              }
          });
      });
  </script>

  </body>

</html>
