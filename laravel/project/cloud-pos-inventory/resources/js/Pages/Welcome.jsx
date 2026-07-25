import { Head, Link } from "@inertiajs/react";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    const handleImageError = () => {
        document
            .getElementById("screenshot-container")
            ?.classList.add("!hidden");
        document.getElementById("docs-card")?.classList.add("!row-span-1");
        document
            .getElementById("docs-card-content")
            ?.classList.add("!flex-row");
        document.getElementById("background")?.classList.add("!hidden");
    };

    return (
        <>
            <div>
                <div id="loading">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div className="object" id="object_four" />
                            <div className="object" id="object_three" />
                            <div className="object" id="object_two" />
                            <div className="object" id="object_one" />
                        </div>
                    </div>
                </div>
                {/* pre loader area end */}
                {/* back to top start */}
                <div className="back-to-top-wrapper">
                    <button
                        id="back_to_top"
                        type="button"
                        className="back-to-top-btn"
                    >
                        <svg
                            width={12}
                            height={7}
                            viewBox="0 0 12 7"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M11 6L6 1L1 6"
                                stroke="currentColor"
                                strokeWidth="1.5"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                            />
                        </svg>
                    </button>
                </div>
                {/* back to top end */}
                {/* search popup start */}
                <div className="search__popup">
                    <div className="container">
                        <div className="row">
                            <div className="col-xxl-12">
                                <div className="search__wrapper">
                                    <div className="search__top d-flex justify-content-between align-items-center">
                                        <div className="search__logo">
                                            <a href="index.html">
                                                <img
                                                    src="assets/img/logo/logo-white.png"
                                                     
                                                />
                                            </a>
                                        </div>
                                        <div className="search__close">
                                            <button
                                                type="button"
                                                className="search__close-btn search-close-btn"
                                            >
                                                <svg
                                                    width={18}
                                                    height={18}
                                                    viewBox="0 0 18 18"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        d="M17 1L1 17"
                                                        stroke="currentColor"
                                                        strokeWidth="1.5"
                                                        strokeLinecap="round"
                                                        strokeLinejoin="round"
                                                    />
                                                    <path
                                                        d="M1 1L17 17"
                                                        stroke="currentColor"
                                                        strokeWidth="1.5"
                                                        strokeLinecap="round"
                                                        strokeLinejoin="round"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div className="search__form">
                                        <form action="#">
                                            <div className="search__input">
                                                <input
                                                    className="search-input-field"
                                                    type="text"
                                                    placeholder="Type here to search..."
                                                />
                                                <span className="search-focus-border" />
                                                <button type="submit">
                                                    <svg
                                                        width={20}
                                                        height={20}
                                                        viewBox="0 0 20 20"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                            d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z"
                                                            stroke="currentColor"
                                                            strokeWidth="1.5"
                                                            strokeLinecap="round"
                                                            strokeLinejoin="round"
                                                        />
                                                        <path
                                                            d="M19.0002 19.0002L17.2002 17.2002"
                                                            stroke="currentColor"
                                                            strokeWidth="1.5"
                                                            strokeLinecap="round"
                                                            strokeLinejoin="round"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {/* search popup end */}
                {/* tp-offcanvus-area-start */}
                <div className="tpoffcanvas-area">
                    <div className="tpoffcanvas">
                        <div className="tpoffcanvas__close-btn">
                            <button className="close-btn">
                                <i className="fal fa-times" />
                            </button>
                        </div>
                        <div className="tpoffcanvas__logo">
                            <a href="index.html">
                                <img src="assets/img/logo/logo-white.png"   />
                            </a>
                        </div>
                        <div className="tpoffcanvas__title">
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Minima incidunt eaque ab
                                cumque, porro maxime autem sed.
                            </p>
                        </div>
                        <div className="tp-main-menu-mobile d-xl-none" />
                        <div className="tpoffcanvas__contact-info">
                            <div className="tpoffcanvas__contact-title">
                                <h5>Contact us</h5>
                            </div>
                            <ul>
                                <li>
                                    <i className="fa-light fa-location-dot" />
                                    <a
                                        href="https://www.google.com/maps/@23.8223586,90.3661283,15z"
                                        target="_blank"
                                    >
                                        Melbone st, Australia, Ny 12099
                                    </a>
                                </li>
                                <li>
                                    <i className="fas fa-envelope" />
                                    <a href="mailto:solaredge@gmail.com">
                                        themepure@gmail.com
                                    </a>
                                </li>
                                <li>
                                    <i className="fal fa-phone- " />
                                    <a href="tel:+48555223224">
                                        +48 555 223 224
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div className="tpoffcanvas__input">
                            <div className="tpoffcanvas__input-title">
                                <h4>Get UPdate</h4>
                            </div>
                            <form action="#">
                                <div className="p-relative">
                                    <input
                                        type="text"
                                        placeholder="Enter mail"
                                    />
                                    <button>
                                        <i className="fas fa-paper-plane" />
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div className="tpoffcanvas__social">
                            <div className="social-icon">
                                <a href="#">
                                    <i className="fab fa-twitter" />
                                </a>
                                <a href="#">
                                    <i className="fab fa-instagram" />
                                </a>
                                <a href="#">
                                    <i className="fab fa-facebook-f" />
                                </a>
                                <a href="#">
                                    <i className="fab fa-pinterest-p" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="body-overlay" />
                {/* tp-offcanvus-area-end */}
                <header className="tp-header-height">
                    {/* header top area start */}
                    <div className="tp-header-top-area tp-header-top-height black-bg">
                        <div className="container custom-container-1">
                            <div className="row">
                                <div className="col-xl-7 col-lg-6 col-md-6 col-sm-6">
                                    <div className="tp-header-top-left">
                                        <ul className="text-center text-sm-start">
                                            <li>
                                                <a
                                                    target="_blank"
                                                    href="https://www.google.com/maps/place/Cumberland+House,+SK,+Canada/@53.6729773,-103.7836571,8z/data=!4m15!1m8!3m7!1s0x4b0d03d337cc6ad9:0x9968b72aa2438fa5!2sCanada!3b1!8m2!3d56.130366!4d-106.346771!16zL20vMGQwNjBn!3m5!1s0x52f917b0cc93e6c1:0x44da1470d37ba724!8m2!3d53.958266!4d-102.267444!16zL20vMDZteWx5?entry=ttu"
                                                >
                                                    <i className="fa-light fa-location-dot" />{" "}
                                                    Manchester 21, Zurich, CH
                                                </a>
                                            </li>
                                            <li className="d-none d-lg-inline-block">
                                                <a href="mailto:broadxinfo@gmail.com">
                                                    <i className="fa-light fa-envelope" />
                                                    broadxinfo@gmail.com
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div className="col-xl-5 col-lg-6 col-md-6 col-sm-6 d-none d-sm-block">
                                    <div className="tp-header-top-social text-end">
                                        <span>You can follow us:</span>
                                        <a href="#">
                                            <i className="flaticon-facebook" />
                                        </a>
                                        <a href="#">
                                            <i className="flaticon-instagram" />
                                        </a>
                                        <a href="#">
                                            <i className="flaticon-tik-tok" />
                                        </a>
                                        <a href="#">
                                            <i className="flaticon-youtube" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* header top area end */}
                    {/* header area start */}
                    <div id="header-sticky" className="tp-header-area">
                        <div className="container custom-container-1">
                            <div className="row align-items-center">
                                <div className="col-xl-2 col-lg-4 col-6">
                                    <div className="tp-header-logo">
                                        <a href="index.html">
                                            <img
                                                src="assets/img/logo/logo-black.png"
                                                 
                                            />
                                        </a>
                                    </div>
                                </div>
                                <div className="col-xl-6 d-none d-xl-block">
                                    <div className="tp-header-main-menu">
                                        <nav className="tp-main-menu-content">
                                            <ul>
                                                <li className="has-dropdown">
                                                    <a href="index.html">
                                                        Home
                                                    </a>
                                                    <div className="tp-submenu submenu has-homemenu">
                                                        <div className="row gx-6 row-cols-1 row-cols-md-2 row-cols-xl-3">
                                                            <div className="col homemenu">
                                                                <div className="homemenu-thumb mb-15">
                                                                    <img
                                                                        src="assets/img/menu/home-1.jpg"
                                                                         
                                                                    />
                                                                    <div className="homemenu-btn">
                                                                        <a
                                                                            className="tp-menu-btn"
                                                                            href="index.html"
                                                                        >
                                                                            Multi
                                                                            page
                                                                        </a>
                                                                        <a
                                                                            className="tp-menu-btn"
                                                                            href="index-one-page.html"
                                                                        >
                                                                            One
                                                                            Page
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="homemenu-content text-center">
                                                                    <h4 className="homemenu-title">
                                                                        <a href="index.html">
                                                                            Home
                                                                            01
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div className="col homemenu">
                                                                <div className="homemenu-thumb mb-15">
                                                                    <img
                                                                        src="assets/img/menu/home-2.jpg"
                                                                         
                                                                    />
                                                                    <div className="homemenu-btn">
                                                                        <a
                                                                            className="tp-menu-btn"
                                                                            href="index-2.html"
                                                                        >
                                                                            Multi
                                                                            page
                                                                        </a>
                                                                        <a
                                                                            className="tp-menu-btn"
                                                                            href="index-2-one-page.html"
                                                                        >
                                                                            One
                                                                            Page
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="homemenu-content text-center">
                                                                    <h4 className="homemenu-title">
                                                                        <a href="index-2.html">
                                                                            Home
                                                                            02
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div className="col homemenu">
                                                                <div className="homemenu-thumb mb-15">
                                                                    <img
                                                                        src="assets/img/menu/home-3.jpg"
                                                                         
                                                                    />
                                                                    <div className="homemenu-btn">
                                                                        <a
                                                                            className="tp-menu-btn"
                                                                            href="index-3.html"
                                                                        >
                                                                            Multi
                                                                            page
                                                                        </a>
                                                                        <a
                                                                            className="tp-menu-btn"
                                                                            href="index-3-one-page.html"
                                                                        >
                                                                            One
                                                                            Page
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="homemenu-content text-center">
                                                                    <h4 className="homemenu-title">
                                                                        <a href="index-3.html">
                                                                            Home
                                                                            03
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li className="has-dropdown">
                                                    <a href="#">Pages</a>
                                                    <ul className="submenu tp-submenu">
                                                        <li>
                                                            <a href="about-us.html">
                                                                about us
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="movie.html">
                                                                Movie
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="team.html">
                                                                team
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="team-details.html">
                                                                team details
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html">
                                                                cart
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="checkout.html">
                                                                checkout
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="price.html">
                                                                price
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="faq.html">
                                                                faq
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="404.html">
                                                                error
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li className="has-dropdown">
                                                    <a href="service.html">
                                                        Service
                                                    </a>
                                                    <ul className="submenu tp-submenu">
                                                        <li>
                                                            <a href="service.html">
                                                                Service
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="service-details.html">
                                                                Service Details
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li className="has-dropdown">
                                                    <a href="blog.html">News</a>
                                                    <ul className="submenu tp-submenu">
                                                        <li>
                                                            <a href="blog.html">
                                                                Blog
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-details.html">
                                                                Blog Details
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li className="has-dropdown">
                                                    <a href="shop.html">Shop</a>
                                                    <ul className="submenu tp-submenu">
                                                        <li>
                                                            <a href="shop.html">
                                                                Shop
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-details.html">
                                                                Shop Details
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="contact.html">
                                                        Contact
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div className="col-xl-4 col-lg-8 col-6">
                                    <div className="tp-header-right d-flex align-items-center justify-content-end">
                                        <div className="tp-header-btn d-none d-md-block">
                                            <a
                                                className="tp-btn-sm"
                                                href="contact.html"
                                            >
                                                <span>Get Started Now</span>
                                            </a>
                                        </div>
                                        <div className="tp-header-icon d-none d-xl-block">
                                            <button className="search-open-btn">
                                                <i className="flaticon-search" />
                                            </button>
                                            <a href="cart.html">
                                                <i className="flaticon-cart" />
                                            </a>
                                        </div>
                                        <div className="tp-header-bar d-xl-none">
                                            <button className="tp-menu-bar">
                                                <i className="fa-solid fa-bars" />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* header area end */}
                </header>
                <main>
                    {/* slider area start */}
                    <div className="tp-slider-area">
                        <div className="tp-slider-wrapper p-relative">
                            <div className="tp-slider-arrow-wrap d-none d-xxl-block">
                                <div className="tp-slider-arrow-box">
                                    <button className="slider-next">
                                        <i className="fa-regular fa-arrow-right" />
                                    </button>
                                    <button className="slider-prev active">
                                        <i className="fa-regular fa-arrow-left" />
                                    </button>
                                </div>
                            </div>
                            <div className="swiper-container tp-slider-active">
                                <div className="swiper-wrapper">
                                    <div className="swiper-slide">
                                        <div className="tp-slider-height tp-slider-overlay p-relative">
                                            <div className="tp-slider-shape-1 d-none d-lg-block">
                                                <a href="#">
                                                    <img
                                                        src="assets/img/slider/shape-1.png"
                                                         
                                                    />
                                                </a>
                                            </div>
                                            <div className="tp-slider-shape-2">
                                                <img
                                                    src="assets/img/slider/shape-2.png"
                                                     
                                                />
                                            </div>
                                            <div className="tp-slider-shape-3 d-none d-lg-block">
                                                <img
                                                    src="assets/img/slider/shape-3.png"
                                                     
                                                />
                                            </div>
                                            <div className="tp-slider-play-box">
                                                <a
                                                    className="popup-video"
                                                    href="https://www.youtube.com/watch?v=K527oNxtO7o"
                                                >
                                                    <i className="fa-sharp fa-light fa-play" />
                                                </a>
                                                <img
                                                    src="assets/img/slider/shape-4.png"
                                                     
                                                />
                                            </div>
                                            <div
                                                className="tp-slider-bg"
                                                data-background="assets/img/slider/slider-1-1.jpg"
                                            />
                                            <div className="container">
                                                <div className="row">
                                                    <div className="col-xl-12">
                                                        <div className="tp-slider-content z-index">
                                                            <div className="tp-slider-title-box mb-30">
                                                                <h4 className="tp-slider-subtitle">
                                                                    Trusted
                                                                    Internet
                                                                    Service
                                                                    Provider
                                                                </h4>
                                                                <h1 className="tp-slider-title">
                                                                    Best
                                                                    Internet{" "}
                                                                    <br />
                                                                    Provider
                                                                    Compnay
                                                                </h1>
                                                            </div>
                                                            <div className="tp-slider-button d-flex align-items-center">
                                                                <div className="tp-slider-price d-none d-sm-block">
                                                                    <span>
                                                                        <b>
                                                                            <i>
                                                                                $
                                                                            </i>
                                                                            39/
                                                                        </b>
                                                                        Per
                                                                        Month
                                                                    </span>
                                                                </div>
                                                                <a
                                                                    className="tp-btn"
                                                                    href="about-us.html"
                                                                >
                                                                    <span>
                                                                        Discover
                                                                        More
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="swiper-slide">
                                        <div className="tp-slider-height tp-slider-overlay p-relative">
                                            <div className="tp-slider-shape-1 d-none d-lg-block">
                                                <a href="#">
                                                    <img
                                                        src="assets/img/slider/shape-1.png"
                                                         
                                                    />
                                                </a>
                                            </div>
                                            <div className="tp-slider-shape-2">
                                                <img
                                                    src="assets/img/slider/shape-2.png"
                                                     
                                                />
                                            </div>
                                            <div className="tp-slider-shape-3 d-none d-lg-block">
                                                <img
                                                    src="assets/img/slider/shape-3.png"
                                                     
                                                />
                                            </div>
                                            <div className="tp-slider-play-box">
                                                <a
                                                    className="popup-video"
                                                    href="https://www.youtube.com/watch?v=K527oNxtO7o"
                                                >
                                                    <i className="fa-sharp fa-light fa-play" />
                                                </a>
                                                <img
                                                    src="assets/img/slider/shape-4.png"
                                                     
                                                />
                                            </div>
                                            <div
                                                className="tp-slider-bg"
                                                data-background="assets/img/slider/slider-1-2.jpg"
                                            />
                                            <div className="container">
                                                <div className="row">
                                                    <div className="col-xl-12">
                                                        <div className="tp-slider-content z-index">
                                                            <div className="tp-slider-title-box mb-30">
                                                                <h4 className="tp-slider-subtitle">
                                                                    Trusted
                                                                    Internet
                                                                    Service
                                                                    Provider
                                                                </h4>
                                                                <h1 className="tp-slider-title">
                                                                    Best
                                                                    Internet{" "}
                                                                    <br />
                                                                    Provider
                                                                    Compnay
                                                                </h1>
                                                            </div>
                                                            <div className="tp-slider-button d-flex align-items-center">
                                                                <div className="tp-slider-price d-none d-sm-block">
                                                                    <span>
                                                                        <b>
                                                                            <i>
                                                                                $
                                                                            </i>
                                                                            39/
                                                                        </b>
                                                                        Per
                                                                        Month
                                                                    </span>
                                                                </div>
                                                                <a
                                                                    className="tp-btn"
                                                                    href="about-us.html"
                                                                >
                                                                    <span>
                                                                        Discover
                                                                        More
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="swiper-slide">
                                        <div className="tp-slider-height tp-slider-overlay p-relative">
                                            <div className="tp-slider-shape-1 d-none d-lg-block">
                                                <a href="#">
                                                    <img
                                                        src="assets/img/slider/shape-1.png"
                                                         
                                                    />
                                                </a>
                                            </div>
                                            <div className="tp-slider-shape-2">
                                                <img
                                                    src="assets/img/slider/shape-2.png"
                                                     
                                                />
                                            </div>
                                            <div className="tp-slider-shape-3 d-none d-lg-block">
                                                <img
                                                    src="assets/img/slider/shape-3.png"
                                                     
                                                />
                                            </div>
                                            <div className="tp-slider-play-box">
                                                <a
                                                    className="popup-video"
                                                    href="https://www.youtube.com/watch?v=K527oNxtO7o"
                                                >
                                                    <i className="fa-sharp fa-light fa-play" />
                                                </a>
                                                <img
                                                    src="assets/img/slider/shape-4.png"
                                                     
                                                />
                                            </div>
                                            <div
                                                className="tp-slider-bg"
                                                data-background="assets/img/slider/slider-1-3.jpg"
                                            />
                                            <div className="container">
                                                <div className="row">
                                                    <div className="col-xl-12">
                                                        <div className="tp-slider-content z-index">
                                                            <div className="tp-slider-title-box mb-30">
                                                                <h4 className="tp-slider-subtitle">
                                                                    Trusted
                                                                    Internet
                                                                    Service
                                                                    Provider
                                                                </h4>
                                                                <h1 className="tp-slider-title">
                                                                    Best
                                                                    Internet{" "}
                                                                    <br />
                                                                    Provider
                                                                    Compnay
                                                                </h1>
                                                            </div>
                                                            <div className="tp-slider-button d-flex align-items-center">
                                                                <div className="tp-slider-price d-none d-sm-block">
                                                                    <span>
                                                                        <b>
                                                                            <i>
                                                                                $
                                                                            </i>
                                                                            39/
                                                                        </b>
                                                                        Per
                                                                        Month
                                                                    </span>
                                                                </div>
                                                                <a
                                                                    className="tp-btn"
                                                                    href="about-us.html"
                                                                >
                                                                    <span>
                                                                        Discover
                                                                        More
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* slider area end */}
                    {/* feature area start */}
                    <div className="tp-feature-area grey-bg pt-120 pb-90">
                        <div className="container custom-container-2">
                            <div className="row">
                                <div
                                    className="col-xl-4 col-lg-4 col-md-6 mb-30  wow tpfadeUp"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".3s"
                                >
                                    <div className="tp-feature-item">
                                        <div className="tp-feature-item-shape">
                                            <img
                                                src="assets/img/feature/shape-1.png"
                                                 
                                            />
                                        </div>
                                        <div className="tp-feature-icon d-flex align-items-center justify-content-between">
                                            <span>
                                                <i className="flaticon-fast" />
                                            </span>
                                            <div className="tp-feature-arrow">
                                                <a href="service-details.html">
                                                    <i className="flaticon-up-right" />
                                                </a>
                                            </div>
                                        </div>
                                        <div className="tp-feature-content d-flex align-items-end justify-content-between">
                                            <div className="tp-feature-text">
                                                <h4 className="tp-feature-title">
                                                    What Speed You Need?
                                                </h4>
                                                <p>
                                                    Phasellus non cursus ligula,
                                                    sed mattisudg Aenean ac tor
                                                    gravida, volutpat
                                                </p>
                                            </div>
                                            <div className="tp-feature-arrow">
                                                <a href="#" className="red">
                                                    <i className="flaticon-up-right" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    className="col-xl-4 col-lg-4 col-md-6 mb-30  wow tpfadeUp"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".5s"
                                >
                                    <div className="tp-feature-item active">
                                        <div className="tp-feature-item-shape">
                                            <img
                                                src="assets/img/feature/shape-1.png"
                                                 
                                            />
                                        </div>
                                        <div className="tp-feature-icon d-flex align-items-center justify-content-between">
                                            <span>
                                                <i className="flaticon-communication-problems" />
                                            </span>
                                            <div className="tp-feature-arrow">
                                                <a href="service-details.html">
                                                    <i className="flaticon-up-right" />
                                                </a>
                                            </div>
                                        </div>
                                        <div className="tp-feature-content d-flex align-items-end justify-content-between">
                                            <div className="tp-feature-text">
                                                <h4 className="tp-feature-title">
                                                    Find Plans in Your Area
                                                </h4>
                                                <p>
                                                    Phasellus non cursus ligula,
                                                    sed mattisudg Aenean ac tor
                                                    gravida, volutpat
                                                </p>
                                            </div>
                                            <div className="tp-feature-arrow">
                                                <a href="#" className="red">
                                                    <i className="flaticon-up-right" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    className="col-xl-4 col-lg-4 col-md-6 mb-30  wow tpfadeUp"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".7s"
                                >
                                    <div className="tp-feature-item">
                                        <div className="tp-feature-item-shape">
                                            <img
                                                src="assets/img/feature/shape-1.png"
                                                 
                                            />
                                        </div>
                                        <div className="tp-feature-icon d-flex align-items-center justify-content-between">
                                            <span>
                                                <i className="flaticon-compare" />
                                            </span>
                                            <div className="tp-feature-arrow">
                                                <a href="service-details.html">
                                                    <i className="flaticon-up-right" />
                                                </a>
                                            </div>
                                        </div>
                                        <div className="tp-feature-content d-flex align-items-end justify-content-between">
                                            <div className="tp-feature-text">
                                                <h4 className="tp-feature-title">
                                                    Compare Providers
                                                </h4>
                                                <p>
                                                    Phasellus non cursus ligula,
                                                    sed mattisudg Aenean ac tor
                                                    gravida, volutpat
                                                </p>
                                            </div>
                                            <div className="tp-feature-arrow">
                                                <a href="#" className="red">
                                                    <i className="flaticon-up-right" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* feature area end */}
                    {/* about area start */}
                    <div className="tp-about-area p-relative fix pt-120 pb-125">
                        <div className="tp-about-shape-2 d-none d-xxl-block">
                            <img src="assets/img/about/thumb-1-3.png"   />
                        </div>
                        <div className="container">
                            <div className="row">
                                <div
                                    className="col-xl-6 col-lg-6  wow tpfadeLeft"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".5s"
                                >
                                    <div className="tp-about-left text-center text-xxl-start p-relative">
                                        <div className="tp-about-main-thumb">
                                            <img
                                                src="assets/img/about/thumb-1-1.jpg"
                                                 
                                            />
                                        </div>
                                        <div className="tp-about-thumb-sm">
                                            <img
                                                src="assets/img/about/thumb-1-2.png"
                                                 
                                            />
                                        </div>
                                        <div className="tp-about-shape-1 d-none d-xl-block zoomInOut">
                                            <img
                                                src="assets/img/about/shape-1-1.png"
                                                 
                                            />
                                        </div>
                                        <div className="tp-about-thumb-text d-none d-xl-block">
                                            <span>BROADX</span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    className="col-xl-6 col-lg-6  wow tpfadeRight"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".9s"
                                >
                                    <div className="tp-about-right">
                                        <div className="tp-about-title-box mb-30">
                                            <span className="tp-section-subtitle">
                                                Broadx Internet and Broadbandy
                                                Company
                                            </span>
                                            <h4 className="tp-section-title">
                                                We are always Faster &amp;
                                                Reliable Company
                                            </h4>
                                        </div>
                                        <div className="tp-about-text mb-25">
                                            <p>
                                                Broadx has come a long way since
                                                its establishment in 1997. From
                                                small beginnings as a provider
                                                of dial-up &amp; radio link
                                                Internet access to local
                                                businesses, we have grown
                                                consistently and organically
                                            </p>
                                        </div>
                                        <div className="tp-about-item-box d-flex align-items-center justify-content-between mb-55">
                                            <div className="tp-about-item active">
                                                <h6 className="tp-about-title-sm">
                                                    To Save Money
                                                </h6>
                                                <p>
                                                    Phasellus non cursus ligula,
                                                    sed mattisudg Aenean
                                                </p>
                                            </div>
                                            <div className="tp-about-item">
                                                <h6 className="tp-about-title-sm">
                                                    To Save Time
                                                </h6>
                                                <p>
                                                    Phasellus non cursus ligula,
                                                    sed mattisudg Aenean
                                                </p>
                                            </div>
                                        </div>
                                        <div className="tp-about-wrap d-flex align-items-center">
                                            <div className="tp-about-contact d-flex align-items-center">
                                                <div className="tp-about-icon">
                                                    <span>
                                                        <i className="flaticon-phone-call" />
                                                    </span>
                                                </div>
                                                <div className="tp-about-icon-text">
                                                    <span>Call us Anytime</span>
                                                    <a href="tel:+99945672985456">
                                                        +999 (4567) 2985 456
                                                    </a>
                                                </div>
                                            </div>
                                            <div className="tp-about-button">
                                                <a
                                                    className="tp-btn theme-bg"
                                                    href="about-us.html"
                                                >
                                                    <span>Discover More</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* about area end */}
                    {/* solution area start */}
                    <div className="tp-solution-area">
                        <div className="container custom-container-3">
                            <div className="tp-solution-wrap">
                                <div className="row">
                                    <div className="col-xl-12">
                                        <div className="tp-solution-title-box mb-100 text-center">
                                            <h4 className="tp-section-title">
                                                Find Perfect Network <br />
                                                Solutions
                                            </h4>
                                        </div>
                                    </div>
                                    <div
                                        className="col-xl-3 col-lg-4 col-md-6 mb-50  wow tpfadeUp"
                                        data-wow-duration=".9s"
                                        data-wow-delay=".3s"
                                    >
                                        <div className="tp-solution-item">
                                            <div className="tp-solution-icon pb-5">
                                                <span>
                                                    <i className="flaticon-internet" />
                                                </span>
                                            </div>
                                            <div className="tp-solution-text">
                                                <h4 className="tp-solution-title">
                                                    <a href="about-us.html">
                                                        Corporate Internet
                                                    </a>
                                                </h4>
                                                <p>
                                                    Our mission is to keep you
                                                    looking for your best with
                                                    Broadx
                                                </p>
                                            </div>
                                            <div className="tp-solution-link">
                                                <a href="about-us.html">
                                                    Discover More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        className="col-xl-3 col-lg-4 col-md-6 mb-50  wow tpfadeUp"
                                        data-wow-duration=".9s"
                                        data-wow-delay=".5s"
                                    >
                                        <div className="tp-solution-item">
                                            <div className="tp-solution-icon pb-5">
                                                <span>
                                                    <i className="flaticon-smart-home" />
                                                </span>
                                            </div>
                                            <div className="tp-solution-text">
                                                <h4 className="tp-solution-title">
                                                    <a href="about-us.html">
                                                        Home Internet
                                                    </a>
                                                </h4>
                                                <p>
                                                    Our mission is to keep you
                                                    looking for your best with
                                                    Broadx
                                                </p>
                                            </div>
                                            <div className="tp-solution-link">
                                                <a href="about-us.html">
                                                    Discover More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        className="col-xl-3 col-lg-4 col-md-6 mb-50  wow tpfadeUp"
                                        data-wow-duration=".9s"
                                        data-wow-delay=".7s"
                                    >
                                        <div className="tp-solution-item">
                                            <div className="tp-solution-icon pb-5">
                                                <span>
                                                    <i className="flaticon-cloud" />
                                                </span>
                                            </div>
                                            <div className="tp-solution-text">
                                                <h4 className="tp-solution-title">
                                                    <a href="about-us.html">
                                                        Hosting &amp;
                                                        Development
                                                    </a>
                                                </h4>
                                                <p>
                                                    Our mission is to keep you
                                                    looking for your best with
                                                    Broadx
                                                </p>
                                            </div>
                                            <div className="tp-solution-link">
                                                <a href="about-us.html">
                                                    Discover More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        className="col-xl-3 col-lg-4 col-md-6 mb-50  wow tpfadeUp"
                                        data-wow-duration=".9s"
                                        data-wow-delay=".9s"
                                    >
                                        <div className="tp-solution-item">
                                            <div className="tp-solution-icon pb-5">
                                                <span>
                                                    <i className="flaticon-satelite" />
                                                </span>
                                            </div>
                                            <div className="tp-solution-text">
                                                <h4 className="tp-solution-title">
                                                    <a href="about-us.html">
                                                        Satelite Chanel
                                                    </a>
                                                </h4>
                                                <p>
                                                    Our mission is to keep you
                                                    looking for your best with
                                                    Broadx
                                                </p>
                                            </div>
                                            <div className="tp-solution-link">
                                                <a href="about-us.html">
                                                    Discover More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* solution area end */}
                    {/* movie area start */}
                    <div
                        className="tp-movie-area black-bg tp-movie-bg"
                        data-background="assets/img/movie/movie-bg.jpg"
                    >
                        <div className="container custom-container-3">
                            <div className="row">
                                <div className="col-xl-12">
                                    <div className="tp-movie-title-box mb-50 text-center z-index">
                                        <span className="tp-section-subtitle text-white">
                                            What’s new
                                        </span>
                                        <h4 className="tp-section-title text-center text-white">
                                            Popular Tv show Sports <br />
                                            &amp; Live Streaming
                                        </h4>
                                    </div>
                                </div>
                                <div className="col-12">
                                    <div className="tp-movie-wrapper">
                                        <div className="swiper-container tp-movie-active">
                                            <div className="swiper-wrapper">
                                                <div className="swiper-slide">
                                                    <div className="tp-movie-item z-index">
                                                        <div className="tp-movie-thumb">
                                                            <div className="tp-movie-shape">
                                                                <img
                                                                    src="assets/img/movie/shape-1.png"
                                                                     
                                                                />
                                                            </div>
                                                            <a href="#">
                                                                <img
                                                                    src="assets/img/movie/movie-1-1.jpg"
                                                                     
                                                                />
                                                            </a>
                                                            <div className="tp-movie-play">
                                                                <a
                                                                    className="popup-video"
                                                                    href="https://www.youtube.com/watch?v=K527oNxtO7o"
                                                                >
                                                                    <i className="fa-regular fa-play" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div className="tp-movie-content d-flex align-items-end justify-content-between">
                                                            <div className="tp-movie-text">
                                                                <h4 className="tp-movie-title">
                                                                    <a href="movie.html">
                                                                        Joker
                                                                        the Lady
                                                                    </a>
                                                                </h4>
                                                                <span>
                                                                    (2018)
                                                                </span>
                                                            </div>
                                                            <div className="tp-movie-review">
                                                                <ul>
                                                                    <li>
                                                                        <i className="fa-solid fa-star" />
                                                                        4.8
                                                                    </li>
                                                                    <li>
                                                                        <i className="fa-solid fa-message-captions" />
                                                                        28
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="swiper-slide">
                                                    <div className="tp-movie-item z-index">
                                                        <div className="tp-movie-thumb">
                                                            <div className="tp-movie-shape">
                                                                <img
                                                                    src="assets/img/movie/shape-1.png"
                                                                     
                                                                />
                                                            </div>
                                                            <a href="#">
                                                                <img
                                                                    src="assets/img/movie/movie-1-2.jpg"
                                                                     
                                                                />
                                                            </a>
                                                            <div className="tp-movie-play">
                                                                <a
                                                                    className="popup-video"
                                                                    href="https://www.youtube.com/watch?v=K527oNxtO7o"
                                                                >
                                                                    <i className="fa-regular fa-play" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div className="tp-movie-content d-flex align-items-end justify-content-between">
                                                            <div className="tp-movie-text">
                                                                <h4 className="tp-movie-title">
                                                                    <a href="movie.html">
                                                                        Last
                                                                        Bullet
                                                                    </a>
                                                                </h4>
                                                                <span>
                                                                    (2019)
                                                                </span>
                                                            </div>
                                                            <div className="tp-movie-review">
                                                                <ul>
                                                                    <li>
                                                                        <i className="fa-solid fa-star" />
                                                                        4.8
                                                                    </li>
                                                                    <li>
                                                                        <i className="fa-solid fa-message-captions" />
                                                                        28
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="swiper-slide">
                                                    <div className="tp-movie-item z-index">
                                                        <div className="tp-movie-thumb">
                                                            <div className="tp-movie-shape">
                                                                <img
                                                                    src="assets/img/movie/shape-1.png"
                                                                     
                                                                />
                                                            </div>
                                                            <a href="#">
                                                                <img
                                                                    src="assets/img/movie/movie-1-3.jpg"
                                                                     
                                                                />
                                                            </a>
                                                            <div className="tp-movie-play">
                                                                <a
                                                                    className="popup-video"
                                                                    href="https://www.youtube.com/watch?v=K527oNxtO7o"
                                                                >
                                                                    <i className="fa-regular fa-play" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div className="tp-movie-content d-flex align-items-end justify-content-between">
                                                            <div className="tp-movie-text">
                                                                <h4 className="tp-movie-title">
                                                                    <a href="movie.html">
                                                                        Jombie
                                                                        Season
                                                                    </a>
                                                                </h4>
                                                                <span>
                                                                    (2020)
                                                                </span>
                                                            </div>
                                                            <div className="tp-movie-review">
                                                                <ul>
                                                                    <li>
                                                                        <i className="fa-solid fa-star" />
                                                                        4.8
                                                                    </li>
                                                                    <li>
                                                                        <i className="fa-solid fa-message-captions" />
                                                                        28
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="swiper-slide">
                                                    <div className="tp-movie-item z-index">
                                                        <div className="tp-movie-thumb">
                                                            <div className="tp-movie-shape">
                                                                <img
                                                                    src="assets/img/movie/shape-1.png"
                                                                     
                                                                />
                                                            </div>
                                                            <a href="#">
                                                                <img
                                                                    src="assets/img/movie/movie-1-4.jpg"
                                                                     
                                                                />
                                                            </a>
                                                            <div className="tp-movie-play">
                                                                <a
                                                                    className="popup-video"
                                                                    href="https://www.youtube.com/watch?v=K527oNxtO7o"
                                                                >
                                                                    <i className="fa-regular fa-play" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div className="tp-movie-content d-flex align-items-end justify-content-between">
                                                            <div className="tp-movie-text">
                                                                <h4 className="tp-movie-title">
                                                                    <a href="movie.html">
                                                                        Ustad
                                                                        Hotel
                                                                    </a>
                                                                </h4>
                                                                <span>
                                                                    (2021)
                                                                </span>
                                                            </div>
                                                            <div className="tp-movie-review">
                                                                <ul>
                                                                    <li>
                                                                        <i className="fa-solid fa-star" />
                                                                        4.8
                                                                    </li>
                                                                    <li>
                                                                        <i className="fa-solid fa-message-captions" />
                                                                        28
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* movie area end */}
                    {/* price area start */}
                    <div className="tp-price-area pt-120 pb-90">
                        <div className="container">
                            <div className="tp-price-wrap p-relative pb-50">
                                <div className="tp-price-shape-1 d-none d-xl-block">
                                    <img
                                        src="assets/img/price/shape-1-1.png"
                                         
                                    />
                                </div>
                                <div className="row align-items-end">
                                    <div className="col-xl-6 col-lg-6 col-md-5">
                                        <div className="tp-price-title-box">
                                            <span className="tp-section-subtitle">
                                                Our Pricing Tables
                                            </span>
                                            <h4 className="tp-section-title">
                                                Discover Our Best <br />
                                                Value Plans
                                            </h4>
                                        </div>
                                    </div>
                                    <div className="col-xl-6 col-lg-6 col-md-7">
                                        <div className="tp-price-tab-wrap d-flex justify-content-start justify-content-md-end">
                                            <div className="tp-price-tab">
                                                <ul
                                                    className="nav nav-tab"
                                                    id="myTab"
                                                    role="tablist"
                                                >
                                                    <li
                                                        className="nav-items"
                                                        role="presentation"
                                                    >
                                                        <button
                                                            className="nav-link active"
                                                            id="home-tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#home"
                                                            type="button"
                                                            role="tab"
                                                            aria-controls="home"
                                                            aria-selected="true"
                                                        >
                                                            Broadband &amp;
                                                            Phone
                                                        </button>
                                                    </li>
                                                    <li
                                                        className="nav-items"
                                                        role="presentation"
                                                    >
                                                        <button
                                                            className="nav-link"
                                                            id="profile-tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#profile"
                                                            type="button"
                                                            role="tab"
                                                            aria-controls="profile"
                                                            aria-selected="false"
                                                        >
                                                            Broadband
                                                        </button>
                                                    </li>
                                                    <li
                                                        className="nav-items"
                                                        role="presentation"
                                                    >
                                                        <button
                                                            className="nav-link"
                                                            id="contact-tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#contact"
                                                            type="button"
                                                            role="tab"
                                                            aria-controls="contact"
                                                            aria-selected="false"
                                                        >
                                                            Phone &amp; TV
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="row">
                                <div className="row">
                                    <div
                                        className="tab-content"
                                        id="myTabContent"
                                    >
                                        <div
                                            className="tab-pane fade show active"
                                            id="home"
                                            role="tabpanel"
                                            aria-labelledby="home-tab"
                                        >
                                            <div className="tp-price-content">
                                                <div className="col-12 mb-30">
                                                    <div className="tp-price-item d-flex align-items-center justify-content-between">
                                                        <div className="tp-price-logo">
                                                            <img
                                                                src="assets/img/price/logo-1-1.png"
                                                                 
                                                            />
                                                        </div>
                                                        <div className="tp-price-info-box d-flex align-items-center">
                                                            <div className="tp-price-info">
                                                                <h4 className="tp-price-info-title">
                                                                    Fibre
                                                                    Unlimited
                                                                </h4>
                                                                <span>
                                                                    Average
                                                                    Spped
                                                                </span>
                                                                <div className="tp-price-info-bottom d-flex align-items-center pt-15">
                                                                    <span className="mb">
                                                                        58 Mb
                                                                    </span>
                                                                    <div className="tp-price-info-icon">
                                                                        <a href="#">
                                                                            <i className="flaticon-wifi" />
                                                                        </a>
                                                                        <a href="#">
                                                                            <i className="flaticon-phone-call-1" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <h3 className="tp-price-info-number">
                                                                    £239
                                                                </h3>
                                                                <span>
                                                                    Gift Card
                                                                </span>
                                                                <p>
                                                                    Offer Ends
                                                                    6/4/2023
                                                                </p>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <i>
                                                                    £25.00 p/m
                                                                </i>
                                                                <span className="mb-5">
                                                                    For 24
                                                                    Months
                                                                </span>
                                                                <i>
                                                                    £0.00 setup
                                                                    costs
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div className="tp-price-button">
                                                            <a
                                                                className="tp-btn black-bg"
                                                                href="price.html"
                                                            >
                                                                <span>
                                                                    Choose Plan
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-12 mb-30">
                                                    <div className="tp-price-item active p-relative d-flex align-items-center justify-content-between">
                                                        <div className="tp-price-offer">
                                                            <span>
                                                                SPEACIAL OFFER
                                                            </span>
                                                        </div>
                                                        <div className="tp-price-logo">
                                                            <img
                                                                src="assets/img/price/logo-1-2.png"
                                                                 
                                                            />
                                                        </div>
                                                        <div className="tp-price-info-box d-flex align-items-center">
                                                            <div className="tp-price-info">
                                                                <h4 className="tp-price-info-title">
                                                                    Fibre
                                                                    Unlimited
                                                                </h4>
                                                                <span>
                                                                    Average
                                                                    Spped
                                                                </span>
                                                                <div className="tp-price-info-bottom d-flex align-items-center pt-15">
                                                                    <span className="mb">
                                                                        58 Mb
                                                                    </span>
                                                                    <div className="tp-price-info-icon">
                                                                        <a href="#">
                                                                            <i className="flaticon-wifi" />
                                                                        </a>
                                                                        <a href="#">
                                                                            <i className="flaticon-phone-call-1" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <h3 className="tp-price-info-number">
                                                                    £359
                                                                </h3>
                                                                <span>
                                                                    Gift Card
                                                                </span>
                                                                <p>
                                                                    Offer Ends
                                                                    6/4/2023
                                                                </p>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <i>
                                                                    £25.00 p/m
                                                                </i>
                                                                <span className="mb-5">
                                                                    For 24
                                                                    Months
                                                                </span>
                                                                <i>
                                                                    £0.00 setup
                                                                    costs
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div className="tp-price-button">
                                                            <a
                                                                className="tp-btn theme-bg"
                                                                href="price.html"
                                                            >
                                                                <span>
                                                                    Choose Plan
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-12 mb-30">
                                                    <div className="tp-price-item d-flex align-items-center justify-content-between">
                                                        <div className="tp-price-logo">
                                                            <img
                                                                src="assets/img/price/logo-1-3.png"
                                                                 
                                                            />
                                                        </div>
                                                        <div className="tp-price-info-box d-flex align-items-center">
                                                            <div className="tp-price-info">
                                                                <h4 className="tp-price-info-title">
                                                                    Fibre
                                                                    Unlimited
                                                                </h4>
                                                                <span>
                                                                    Average
                                                                    Spped
                                                                </span>
                                                                <div className="tp-price-info-bottom d-flex align-items-center pt-15">
                                                                    <span className="mb">
                                                                        58 Mb
                                                                    </span>
                                                                    <div className="tp-price-info-icon">
                                                                        <a href="#">
                                                                            <i className="flaticon-wifi" />
                                                                        </a>
                                                                        <a href="#">
                                                                            <i className="flaticon-phone-call-1" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <h3 className="tp-price-info-number">
                                                                    £469
                                                                </h3>
                                                                <span>
                                                                    Gift Card
                                                                </span>
                                                                <p>
                                                                    Offer Ends
                                                                    6/4/2023
                                                                </p>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <i>
                                                                    £25.00 p/m
                                                                </i>
                                                                <span className="mb-5">
                                                                    For 24
                                                                    Months
                                                                </span>
                                                                <i>
                                                                    £0.00 setup
                                                                    costs
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div className="tp-price-button">
                                                            <a
                                                                className="tp-btn black-bg"
                                                                href="price.html"
                                                            >
                                                                <span>
                                                                    Choose Plan
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            className="tab-pane fade"
                                            id="profile"
                                            role="tabpanel"
                                            aria-labelledby="profile-tab"
                                        >
                                            <div className="tp-price-content">
                                                <div className="col-12 mb-30">
                                                    <div className="tp-price-item d-flex align-items-center justify-content-between">
                                                        <div className="tp-price-logo">
                                                            <img
                                                                src="assets/img/price/logo-1-1.png"
                                                                 
                                                            />
                                                        </div>
                                                        <div className="tp-price-info-box d-flex align-items-center">
                                                            <div className="tp-price-info">
                                                                <h4 className="tp-price-info-title">
                                                                    Fibre
                                                                    Unlimited
                                                                </h4>
                                                                <span>
                                                                    Average
                                                                    Spped
                                                                </span>
                                                                <div className="tp-price-info-bottom d-flex align-items-center pt-15">
                                                                    <span className="mb">
                                                                        58 Mb
                                                                    </span>
                                                                    <div className="tp-price-info-icon">
                                                                        <a href="#">
                                                                            <i className="flaticon-wifi" />
                                                                        </a>
                                                                        <a href="#">
                                                                            <i className="flaticon-phone-call-1" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <h3 className="tp-price-info-number">
                                                                    £211
                                                                </h3>
                                                                <span>
                                                                    Gift Card
                                                                </span>
                                                                <p>
                                                                    Offer Ends
                                                                    6/4/2023
                                                                </p>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <i>
                                                                    £25.00 p/m
                                                                </i>
                                                                <span className="mb-5">
                                                                    For 24
                                                                    Months
                                                                </span>
                                                                <i>
                                                                    £0.00 setup
                                                                    costs
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div className="tp-price-button">
                                                            <a
                                                                className="tp-btn black-bg"
                                                                href="price.html"
                                                            >
                                                                <span>
                                                                    Choose Plan
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-12 mb-30">
                                                    <div className="tp-price-item active p-relative d-flex align-items-center justify-content-between">
                                                        <div className="tp-price-offer">
                                                            <span>
                                                                SPEACIAL OFFER
                                                            </span>
                                                        </div>
                                                        <div className="tp-price-logo">
                                                            <img
                                                                src="assets/img/price/logo-1-2.png"
                                                                 
                                                            />
                                                        </div>
                                                        <div className="tp-price-info-box d-flex align-items-center">
                                                            <div className="tp-price-info">
                                                                <h4 className="tp-price-info-title">
                                                                    Fibre
                                                                    Unlimited
                                                                </h4>
                                                                <span>
                                                                    Average
                                                                    Spped
                                                                </span>
                                                                <div className="tp-price-info-bottom d-flex align-items-center pt-15">
                                                                    <span className="mb">
                                                                        58 Mb
                                                                    </span>
                                                                    <div className="tp-price-info-icon">
                                                                        <a href="#">
                                                                            <i className="flaticon-wifi" />
                                                                        </a>
                                                                        <a href="#">
                                                                            <i className="flaticon-phone-call-1" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <h3 className="tp-price-info-number">
                                                                    £263
                                                                </h3>
                                                                <span>
                                                                    Gift Card
                                                                </span>
                                                                <p>
                                                                    Offer Ends
                                                                    6/4/2023
                                                                </p>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <i>
                                                                    £25.00 p/m
                                                                </i>
                                                                <span className="mb-5">
                                                                    For 24
                                                                    Months
                                                                </span>
                                                                <i>
                                                                    £0.00 setup
                                                                    costs
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div className="tp-price-button">
                                                            <a
                                                                className="tp-btn theme-bg"
                                                                href="price.html"
                                                            >
                                                                <span>
                                                                    Choose Plan
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-12 mb-30">
                                                    <div className="tp-price-item d-flex align-items-center justify-content-between">
                                                        <div className="tp-price-logo">
                                                            <img
                                                                src="assets/img/price/logo-1-3.png"
                                                                 
                                                            />
                                                        </div>
                                                        <div className="tp-price-info-box d-flex align-items-center">
                                                            <div className="tp-price-info">
                                                                <h4 className="tp-price-info-title">
                                                                    Fibre
                                                                    Unlimited
                                                                </h4>
                                                                <span>
                                                                    Average
                                                                    Spped
                                                                </span>
                                                                <div className="tp-price-info-bottom d-flex align-items-center pt-15">
                                                                    <span className="mb">
                                                                        58 Mb
                                                                    </span>
                                                                    <div className="tp-price-info-icon">
                                                                        <a href="#">
                                                                            <i className="flaticon-wifi" />
                                                                        </a>
                                                                        <a href="#">
                                                                            <i className="flaticon-phone-call-1" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <h3 className="tp-price-info-number">
                                                                    £435
                                                                </h3>
                                                                <span>
                                                                    Gift Card
                                                                </span>
                                                                <p>
                                                                    Offer Ends
                                                                    6/4/2023
                                                                </p>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <i>
                                                                    £25.00 p/m
                                                                </i>
                                                                <span className="mb-5">
                                                                    For 24
                                                                    Months
                                                                </span>
                                                                <i>
                                                                    £0.00 setup
                                                                    costs
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div className="tp-price-button">
                                                            <a
                                                                className="tp-btn black-bg"
                                                                href="price.html"
                                                            >
                                                                <span>
                                                                    Choose Plan
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            className="tab-pane fade"
                                            id="contact"
                                            role="tabpanel"
                                            aria-labelledby="contact-tab"
                                        >
                                            <div className="tp-price-content">
                                                <div className="col-12 mb-30">
                                                    <div className="tp-price-item d-flex align-items-center justify-content-between">
                                                        <div className="tp-price-logo">
                                                            <img
                                                                src="assets/img/price/logo-1-1.png"
                                                                 
                                                            />
                                                        </div>
                                                        <div className="tp-price-info-box d-flex align-items-center">
                                                            <div className="tp-price-info">
                                                                <h4 className="tp-price-info-title">
                                                                    Fibre
                                                                    Unlimited
                                                                </h4>
                                                                <span>
                                                                    Average
                                                                    Spped
                                                                </span>
                                                                <div className="tp-price-info-bottom d-flex align-items-center pt-15">
                                                                    <span className="mb">
                                                                        58 Mb
                                                                    </span>
                                                                    <div className="tp-price-info-icon">
                                                                        <a href="#">
                                                                            <i className="flaticon-wifi" />
                                                                        </a>
                                                                        <a href="#">
                                                                            <i className="flaticon-phone-call-1" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <h3 className="tp-price-info-number">
                                                                    £209
                                                                </h3>
                                                                <span>
                                                                    Gift Card
                                                                </span>
                                                                <p>
                                                                    Offer Ends
                                                                    6/4/2023
                                                                </p>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <i>
                                                                    £25.00 p/m
                                                                </i>
                                                                <span className="mb-5">
                                                                    For 24
                                                                    Months
                                                                </span>
                                                                <i>
                                                                    £0.00 setup
                                                                    costs
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div className="tp-price-button">
                                                            <a
                                                                className="tp-btn black-bg"
                                                                href="price.html"
                                                            >
                                                                <span>
                                                                    Choose Plan
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-12 mb-30">
                                                    <div className="tp-price-item active p-relative d-flex align-items-center justify-content-between">
                                                        <div className="tp-price-offer">
                                                            <span>
                                                                SPEACIAL OFFER
                                                            </span>
                                                        </div>
                                                        <div className="tp-price-logo">
                                                            <img
                                                                src="assets/img/price/logo-1-2.png"
                                                                 
                                                            />
                                                        </div>
                                                        <div className="tp-price-info-box d-flex align-items-center">
                                                            <div className="tp-price-info">
                                                                <h4 className="tp-price-info-title">
                                                                    Fibre
                                                                    Unlimited
                                                                </h4>
                                                                <span>
                                                                    Average
                                                                    Spped
                                                                </span>
                                                                <div className="tp-price-info-bottom d-flex align-items-center pt-15">
                                                                    <span className="mb">
                                                                        58 Mb
                                                                    </span>
                                                                    <div className="tp-price-info-icon">
                                                                        <a href="#">
                                                                            <i className="flaticon-wifi" />
                                                                        </a>
                                                                        <a href="#">
                                                                            <i className="flaticon-phone-call-1" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <h3 className="tp-price-info-number">
                                                                    £106
                                                                </h3>
                                                                <span>
                                                                    Gift Card
                                                                </span>
                                                                <p>
                                                                    Offer Ends
                                                                    6/4/2023
                                                                </p>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <i>
                                                                    £25.00 p/m
                                                                </i>
                                                                <span className="mb-5">
                                                                    For 24
                                                                    Months
                                                                </span>
                                                                <i>
                                                                    £0.00 setup
                                                                    costs
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div className="tp-price-button">
                                                            <a
                                                                className="tp-btn theme-bg"
                                                                href="price.html"
                                                            >
                                                                <span>
                                                                    Choose Plan
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-12 mb-30">
                                                    <div className="tp-price-item d-flex align-items-center justify-content-between">
                                                        <div className="tp-price-logo">
                                                            <img
                                                                src="assets/img/price/logo-1-3.png"
                                                                 
                                                            />
                                                        </div>
                                                        <div className="tp-price-info-box d-flex align-items-center">
                                                            <div className="tp-price-info">
                                                                <h4 className="tp-price-info-title">
                                                                    Fibre
                                                                    Unlimited
                                                                </h4>
                                                                <span>
                                                                    Average
                                                                    Spped
                                                                </span>
                                                                <div className="tp-price-info-bottom d-flex align-items-center pt-15">
                                                                    <span className="mb">
                                                                        58 Mb
                                                                    </span>
                                                                    <div className="tp-price-info-icon">
                                                                        <a href="#">
                                                                            <i className="flaticon-wifi" />
                                                                        </a>
                                                                        <a href="#">
                                                                            <i className="flaticon-phone-call-1" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <h3 className="tp-price-info-number">
                                                                    £887
                                                                </h3>
                                                                <span>
                                                                    Gift Card
                                                                </span>
                                                                <p>
                                                                    Offer Ends
                                                                    6/4/2023
                                                                </p>
                                                            </div>
                                                            <div className="tp-price-info">
                                                                <i>
                                                                    £25.00 p/m
                                                                </i>
                                                                <span className="mb-5">
                                                                    For 24
                                                                    Months
                                                                </span>
                                                                <i>
                                                                    £0.00 setup
                                                                    costs
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div className="tp-price-button">
                                                            <a
                                                                className="tp-btn black-bg"
                                                                href="price.html"
                                                            >
                                                                <span>
                                                                    Choose Plan
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* price area end */}
                    {/* subscribe area start */}
                    <div className="tp-subscribe-area grey-bg p-relative fix pt-135 pb-140">
                        <div className="tp-subscribe-text-big d-none d-md-block">
                            <h4>
                                25% <br />
                                OFF
                            </h4>
                        </div>
                        <div className="container">
                            <div className="row">
                                <div
                                    className="offset-xl-6 offset-lg-6 col-xl-6 col-lg-6 wow tpfadeRight"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".7s"
                                >
                                    <div className="tp-subscribe-item z-index">
                                        <h4 className="tp-section-title pb-30">
                                            Enjoy Sports Movies, <br />
                                            TV Shows &amp; More
                                        </h4>
                                        <div className="tp-subscribe-list pb-60">
                                            <ul>
                                                <li>
                                                    <i className="flaticon-wifi-router" />
                                                    Free Wifi Router for Fisrt
                                                    Time Setup
                                                </li>
                                                <li>
                                                    <i className="flaticon-high-speed" />
                                                    150 Mbps Internet Speed
                                                </li>
                                                <li>
                                                    <i className="flaticon-tv" />
                                                    260+ Maxi TV Chanel
                                                </li>
                                            </ul>
                                        </div>
                                        <div className="tp-subscribe-rate wrap d-flex align-items-center">
                                            <span>
                                                £469<i>/Monthly</i>
                                            </span>
                                            <a
                                                className="tp-btn theme-bg ml-40"
                                                href="price.html"
                                            >
                                                <span>View All Plans</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="tp-subscribe-thumb">
                            <img
                                src="assets/img/subscribe/subscribe-1.png"
                                 
                            />
                            <div className="tp-subscribe-text-sm">
                                <h4>
                                    25% <br />
                                    OFF
                                </h4>
                            </div>
                        </div>
                    </div>
                    {/* subscribe area end */}
                    {/* testimonial area start */}
                    <div className="tp-testimonial-area p-relative black-bg pt-120 pb-120">
                        <div className="tp-testimonial-shape-1">
                            <img src="assets/img/testimonial/shape-1.png"   />
                        </div>
                        <div className="container">
                            <div className="row">
                                <div className="col-xl-4 col-lg-4 col-md-4">
                                    <div className="tp-testimonial-thumb text-center text-xl-start">
                                        <img
                                            src="assets/img/testimonial/avata-1-1.png"
                                             
                                        />
                                        <div className="tp-testimonial-quot">
                                            <span>
                                                <i className="flaticon-quote" />
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-xl-8 col-lg-8 col-md-8">
                                    <div className="tp-testimonial-wrapper">
                                        <div className="swiper-container tp-testimonial-active">
                                            <div className="swiper-wrapper">
                                                <div className="swiper-slide">
                                                    <div className="tp-testimonial-item">
                                                        <div className="tp-testimonial-star pb-10">
                                                            <i className="fa-solid fa-star" />
                                                            <i className="fa-solid fa-star" />
                                                            <i className="fa-solid fa-star" />
                                                            <i className="fa-solid fa-star" />
                                                            <i className="fa-solid fa-star" />
                                                        </div>
                                                        <div className="tp-testimonial-text mb-55">
                                                            <p>
                                                                I want to begin
                                                                by thanking
                                                                Sandra for her
                                                                leadership, her
                                                                compassion, her
                                                                good humour and
                                                                her friendship
                                                                during the past
                                                                12 months. She
                                                                has been mayor.
                                                            </p>
                                                        </div>
                                                        <div className="tp-testimonial-author-box d-flex align-items-center">
                                                            <div className="tp-testimonial-author-thumb">
                                                                <img
                                                                    src="assets/img/avata/avata-1.png"
                                                                     
                                                                />
                                                            </div>
                                                            <div className="tp-testimonial-author-info">
                                                                <h5>
                                                                    Laura Lepia
                                                                </h5>
                                                                <span>
                                                                    Designer
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="swiper-slide">
                                                    <div className="tp-testimonial-item">
                                                        <div className="tp-testimonial-star pb-10">
                                                            <i className="fa-solid fa-star" />
                                                            <i className="fa-solid fa-star" />
                                                            <i className="fa-solid fa-star" />
                                                            <i className="fa-solid fa-star" />
                                                            <i className="fa-solid fa-star" />
                                                        </div>
                                                        <div className="tp-testimonial-text mb-55">
                                                            <p>
                                                                I want to begin
                                                                by thanking
                                                                Sandra for her
                                                                leadership, her
                                                                compassion, her
                                                                good humour and
                                                                her friendship
                                                                during the past
                                                                12 months. She
                                                                has been mayor.
                                                            </p>
                                                        </div>
                                                        <div className="tp-testimonial-author-box d-flex align-items-center">
                                                            <div className="tp-testimonial-author-thumb">
                                                                <img
                                                                    src="assets/img/avata/avata-3.png"
                                                                     
                                                                />
                                                            </div>
                                                            <div className="tp-testimonial-author-info">
                                                                <h5>
                                                                    Woodrow
                                                                    Garner
                                                                </h5>
                                                                <span>
                                                                    Developer
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="tp-testimonial-arrow-box">
                                                <button className="test-next">
                                                    <i className="fa-regular fa-arrow-left" />
                                                </button>
                                                <button className="test-prev">
                                                    <i className="fa-regular fa-arrow-right" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* testimonial area end */}
                    {/* feature area start */}
                    <div className="tp-feature-3-area p-relative fix pt-120">
                        <div className="tp-feature-3-shape-1 d-none d-xxl-block">
                            <img src="assets/img/service/shape-2.png"   />
                        </div>
                        <div className="tp-feature-3-thumb-box">
                            <div className="tp-feature-3-shape-2 d-none d-xxl-block">
                                <img src="assets/img/service/shape-1.png"   />
                            </div>
                            <div className="tp-feature-3-shape-3 d-none d-xxl-block">
                                <img
                                    src="assets/img/service/shape-1-3.png"
                                     
                                />
                            </div>
                            <div className="tp-feature-3-play d-none d-lg-block">
                                <a
                                    className="popup-video"
                                    href="https://www.youtube.com/watch?v=PO_fBTkoznc"
                                >
                                    <i
                                        className=" fa-regular
            fa-play"
                                    />
                                </a>
                            </div>
                            <div className="tp-feature-3-funfact-wrap d-none d-lg-flex align-items-center">
                                <ul>
                                    <li>
                                        <div className="tp-feature-3-funfact d-flex align-items-center">
                                            <i
                                                className="purecounter"
                                                data-purecounter-duration={1}
                                                data-purecounter-end={20}
                                            >
                                                0
                                            </i>
                                            <span>
                                                Years <br />
                                                Experience
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div className="tp-feature-3-funfact d-flex align-items-center">
                                            <i
                                                className="purecounter"
                                                data-purecounter-duration={1}
                                                data-purecounter-end={290}
                                            >
                                                0
                                            </i>
                                            <span>
                                                Satelite <br />
                                                Chanel
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div className="tp-feature-3-thumb jarallax p-relative">
                                <img src="assets/img/service/bg-1-1.jpg"   />
                            </div>
                        </div>
                        <div className="container">
                            <div className="tp-feature-3-title-wrap">
                                <div className="row align-items-end">
                                    <div className="col-xl-7 col-lg-6">
                                        <div className="tp-feature-3-title-box">
                                            <span className="tp-section-subtitle">
                                                Check Our Benifits
                                            </span>
                                            <h4 className="tp-section-title">
                                                Why You Should Choose <br />
                                                Broadx Services
                                            </h4>
                                        </div>
                                    </div>
                                    <div className="col-xl-5 col-lg-6">
                                        <div className="tp-feature-3-top">
                                            <p>
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit
                                                honcus a turpis sit amet Donec
                                                nec elementum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-xl-5 col-lg-5">
                                    <div className="tp-feature-3-item-box">
                                        <div className="tp-feature-3-item d-flex align-items-center">
                                            <div className="tp-feature-3-icon">
                                                <span>
                                                    <i className="flaticon-satelite-1" />
                                                </span>
                                            </div>
                                            <div className="tp-feature-3-text">
                                                <h5 className="tp-feature-3-title">
                                                    Satelite TV
                                                </h5>
                                                <p>
                                                    Lorem ipsum adipiscing elit
                                                    Donec necip ipsum crtes
                                                    elementum
                                                </p>
                                            </div>
                                        </div>
                                        <div className="tp-feature-3-item d-flex align-items-center">
                                            <div className="tp-feature-3-icon">
                                                <span>
                                                    <i className="flaticon-home-network" />
                                                </span>
                                            </div>
                                            <div className="tp-feature-3-text">
                                                <h5 className="tp-feature-3-title">
                                                    Home Security
                                                </h5>
                                                <p>
                                                    Lorem ipsum adipiscing elit
                                                    Donec necip ipsum crtes
                                                    elementum
                                                </p>
                                            </div>
                                        </div>
                                        <div className="tp-feature-3-item d-flex align-items-center">
                                            <div className="tp-feature-3-icon">
                                                <span>
                                                    <i className="flaticon-24-hours-support" />
                                                </span>
                                            </div>
                                            <div className="tp-feature-3-text">
                                                <h5 className="tp-feature-3-title">
                                                    24/7 Hour Support
                                                </h5>
                                                <p>
                                                    Lorem ipsum adipiscing elit
                                                    Donec necip ipsum crtes
                                                    elementum
                                                </p>
                                            </div>
                                        </div>
                                        <div className="tp-feature-3-item mb d-flex align-items-center">
                                            <div className="tp-feature-3-icon">
                                                <span>
                                                    <i className="flaticon-tv" />
                                                </span>
                                            </div>
                                            <div className="tp-feature-3-text">
                                                <h5 className="tp-feature-3-title">
                                                    Free Instalation
                                                </h5>
                                                <p>
                                                    Lorem ipsum adipiscing elit
                                                    Donec necip ipsum crtes
                                                    elementum
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* feature area end */}
                    {/* blog area start */}
                    <div className="tp-blog-area pt-120 pb-60">
                        <div className="container">
                            <div className="row">
                                <div className="col-xl-12">
                                    <div className="tp-blog-title-box text-center mb-35">
                                        <span className="tp-section-subtitle">
                                            Our News &amp; Blog
                                        </span>
                                        <h4 className="tp-section-title">
                                            Read Our Latest News
                                        </h4>
                                    </div>
                                </div>
                                <div
                                    className="col-xl-4 col-lg-4 col-md-6 mb-30  wow tpfadeUp"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".3s"
                                >
                                    <div className="tp-blog-item">
                                        <div className="tp-blog-meta pb-20">
                                            <span>April 23, 2023</span>
                                            <span>Broadband_Satelite</span>
                                        </div>
                                        <div className="tp-blog-thumb p-relative mb-30">
                                            <img
                                                src="assets/img/blog/blog-1-1.jpg"
                                                 
                                            />
                                            <div className="tp-blog-thumb-icon">
                                                <a
                                                    className="popup-image"
                                                    href="assets/img/blog/blog-1-1.jpg"
                                                >
                                                    <i className="fa-light fa-plus" />
                                                </a>
                                            </div>
                                        </div>
                                        <div className="tp-blog-text">
                                            <h4 className="tp-blog-title">
                                                <a href="blog-details.html">
                                                    No Matter How Hot You Get
                                                    This Summer, Don't Sleep
                                                    Naked{" "}
                                                </a>
                                            </h4>
                                            <a href="blog-details.html">
                                                Read More
                                                <i className="fa-regular fa-arrow-right" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    className="col-xl-4 col-lg-4 col-md-6 mb-30  wow tpfadeUp"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".5s"
                                >
                                    <div className="tp-blog-item">
                                        <div className="tp-blog-meta pb-20">
                                            <span>April 23, 2023</span>
                                            <span>Internet</span>
                                        </div>
                                        <div className="tp-blog-thumb p-relative mb-30">
                                            <img
                                                src="assets/img/blog/blog-1-2.jpg"
                                                 
                                            />
                                            <div className="tp-blog-thumb-icon">
                                                <a
                                                    className="popup-image"
                                                    href="assets/img/blog/blog-1-2.jpg"
                                                >
                                                    <i className="fa-light fa-plus" />
                                                </a>
                                            </div>
                                        </div>
                                        <div className="tp-blog-text">
                                            <h4 className="tp-blog-title">
                                                <a href="blog-details.html">
                                                    Looking for More Content? We
                                                    May Have What You Want{" "}
                                                </a>
                                            </h4>
                                            <a href="blog-details.html">
                                                Read More
                                                <i className="fa-regular fa-arrow-right" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    className="col-xl-4 col-lg-4 col-md-6 mb-30  wow tpfadeUp"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".7s"
                                >
                                    <div className="tp-blog-item">
                                        <div className="tp-blog-meta pb-20">
                                            <span>April 23, 2023</span>
                                            <span>TV_Internet</span>
                                        </div>
                                        <div className="tp-blog-thumb p-relative mb-30">
                                            <img
                                                src="assets/img/blog/blog-1-3.jpg"
                                                 
                                            />
                                            <div className="tp-blog-thumb-icon">
                                                <a
                                                    className="popup-image"
                                                    href="assets/img/blog/blog-1-3.jpg"
                                                >
                                                    <i className="fa-light fa-plus" />
                                                </a>
                                            </div>
                                        </div>
                                        <div className="tp-blog-text">
                                            <h4 className="tp-blog-title">
                                                <a href="blog-details.html">
                                                    3 Ways Make Your Kids
                                                    Smarter About Online
                                                    Security
                                                </a>
                                            </h4>
                                            <a href="blog-details.html">
                                                Read More
                                                <i className="fa-regular fa-arrow-right" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* blog area end */}
                    {/* text-slider area start */}
                    <div className="tp-slider-text-area fix pb-100">
                        <div className="container-fluid">
                            <div className="row">
                                <div className="col-xl-12">
                                    <div className="tp-slider-text-box">
                                        <span>
                                            BROADX <b>INTERNET</b> BROADBAND
                                            BROADX <b>INTERNET</b> BROADBAND
                                            BROADX <b>INTERNET</b> BROADBAND
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* text-slider area end */}
                    {/* instagram area start */}
                    <div className="tp-instagram-area black-bg pt-140">
                        <div className="container">
                            <div className="row">
                                <div className="col-xl-3 col-lg-3 col-md-3">
                                    <div className="tp-instagram-title-box">
                                        <h4 className="tp-instagram-title">
                                            Follow Us On Instgram
                                        </h4>
                                        <a href="#">
                                            Follow @broadx
                                            <i className="fa-sharp fa-regular fa-arrow-right" />
                                        </a>
                                    </div>
                                </div>
                                <div className="col-xl-9 col-lg-9 col-md-9">
                                    <div className="tp-instagram-wrap d-flex justify-content-between">
                                        <div className="tp-instagram-thumb p-relative">
                                            <img
                                                src="assets/img/instagram/instagram-1-2.jpg"
                                                 
                                            />
                                            <div className="tp-instagram-play">
                                                <a href="#">
                                                    <i className="fa-brands fa-instagram" />
                                                </a>
                                            </div>
                                        </div>
                                        <div className="tp-instagram-thumb p-relative">
                                            <img
                                                src="assets/img/instagram/instagram-1-1.jpg"
                                                 
                                            />
                                            <div className="tp-instagram-play">
                                                <a href="#">
                                                    <i className="fa-brands fa-instagram" />
                                                </a>
                                            </div>
                                        </div>
                                        <div className="tp-instagram-thumb p-relative">
                                            <img
                                                src="assets/img/instagram/instagram-1-3.jpg"
                                                 
                                            />
                                            <div className="tp-instagram-play">
                                                <a href="#">
                                                    <i className="fa-brands fa-instagram" />
                                                </a>
                                            </div>
                                        </div>
                                        <div className="tp-instagram-thumb p-relative">
                                            <img
                                                src="assets/img/instagram/instagram-1-4.jpg"
                                                 
                                            />
                                            <div className="tp-instagram-play">
                                                <a href="#">
                                                    <i className="fa-brands fa-instagram" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* instagram area end */}
                </main>
                <footer>
                    {/* footer area start */}
                    <div className="tp-footer-area  black-bg pt-95">
                        <div className="container">
                            <div className="tp-footer-border pb-40">
                                <div className="row">
                                    <div
                                        className="col-xl-4 col-lg-3 col-md-6 col-sm-6 mb-50  wow tpfadeUp"
                                        data-wow-duration=".9s"
                                        data-wow-delay=".3s"
                                    >
                                        <div className="tp-footer-widget footer-cols-1">
                                            <div className="tp-footer-logo pb-35">
                                                <a href="index.html">
                                                    <img
                                                        src="assets/img/logo/logo-white.png"
                                                         
                                                    />
                                                </a>
                                            </div>
                                            <div className="tp-footer-text">
                                                <p>
                                                    Broadx means more than just
                                                    TV or Connect Internet
                                                </p>
                                            </div>
                                            <div className="tp-footer-social">
                                                <a href="#">
                                                    <i className="fa-brands fa-facebook-f" />
                                                </a>
                                                <a href="#">
                                                    <i className="fa-brands fa-instagram" />
                                                </a>
                                                <a href="#">
                                                    <i className="fa-brands fa-pinterest-p" />
                                                </a>
                                                <a href="#">
                                                    <i className="fa-brands fa-twitter" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        className="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-50  wow tpfadeUp"
                                        data-wow-duration=".9s"
                                        data-wow-delay=".5s"
                                    >
                                        <div className="tp-footer-widget footer-cols-2">
                                            <h4 className="tp-footer-title">
                                                Navigation
                                            </h4>
                                            <div className="tp-footer-list">
                                                <ul>
                                                    <li>
                                                        <a href="#">Home</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">About</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Our Package
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Services</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">News</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        className="col-xl-2 col-lg-3 col-md-6 col-sm-6 mb-50  wow tpfadeUp"
                                        data-wow-duration=".9s"
                                        data-wow-delay=".7s"
                                    >
                                        <div className="tp-footer-widget footer-cols-3">
                                            <h4 className="tp-footer-title">
                                                Customer
                                            </h4>
                                            <div className="tp-footer-list">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            Laptop &amp;
                                                            Computers
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Home &amp; Life
                                                            Style
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Customer Gurantee
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Broadx Media
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Internet Connection
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        className="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-50  wow tpfadeUp"
                                        data-wow-duration=".9s"
                                        data-wow-delay=".9s"
                                    >
                                        <div className="tp-footer-widget footer-cols-4">
                                            <h4 className="tp-footer-title">
                                                Contact
                                            </h4>
                                            <div className="tp-footer-contact">
                                                <a href="#">
                                                    Bouvet Island Jeanetteside
                                                    53 Brannon Falls Suite{" "}
                                                    <br />
                                                    NY, USA
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* footer area end */}
                    {/* copy-right area start */}
                    <div className="tp-copyright-area tp-copyright-space black-bg">
                        <div className="container">
                            <div className="row align-items-center">
                                <div
                                    className="col-xl-6 col-lg-6 col-md-6 col-12 wow tpfadeUp"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".3s"
                                >
                                    <div className="tp-copyright-left text-center text-md-start">
                                        <p>
                                            © 2023 <a href="#">Broadx</a> is
                                            Proudly Powered by Themepure
                                        </p>
                                    </div>
                                </div>
                                <div
                                    className="col-xl-6 col-lg-6 col-md-6 col-12 wow tpfadeUp"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".5s"
                                >
                                    <div className="tp-copyright-right text-center text-md-end">
                                        <a href="#">Privacy Policy</a>
                                        <span>/</span>
                                        <a href="#">Terms of Use</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* copy-right area end */}
                </footer>
            </div>
        </>
    );
}
