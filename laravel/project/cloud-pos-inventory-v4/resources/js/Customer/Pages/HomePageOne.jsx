import React from "react";
import Preloader from "../Helpers/Preloader";
import HeaderOne from "../Components/HeaderOne";
import BannerOne from "../Components/BannerOne";
import FeatureOne from "../Components/FeatureOne";
import PromotionalOne from "../Components/PromotionalOne";
import FlashSalesOne from "../Components/FlashSalesOne";
import ProductListOne from "../Components/ProductListOne";
import OfferOne from "../Components/OfferOne";
import RecommendedOne from "../Components/RecommendedOne";
import HotDealsOne from "../Components/HotDealsOne";
import TopVendorsOne from "../Components/TopVendorsOne";
import BestSellsOne from "../Components/BestSellsOne";
import DeliveryOne from "../Components/DeliveryOne";
import OrganicOne from "../Components/OrganicOne";
import ShortProductOne from "../Components/ShortProductOne";
import BrandOne from "../Components/BrandOne";
import NewArrivalOne from "../Components/NewArrivalOne";
import ShippingOne from "../Components/ShippingOne";
import NewsletterOne from "../Components/NewsletterOne";
import FooterOne from "../Components/FooterOne";
import BottomFooter from "../Components/BottomFooter";
import ScrollToTop from "react-scroll-to-top";
import ColorInit from "../Helpers/ColorInit";
const HomePageOne = () => {

  return (

    <>

      {/* Preloader */}
      <Preloader />

      {/* ScrollToTop */}
      <ScrollToTop smooth color="#299E60" />

      {/* ColorInit */}
      <ColorInit color={false} />

      {/* HeaderOne */}
      <HeaderOne />

      {/* BannerOne */}
      <BannerOne />

      {/* FeatureOne */}
      <FeatureOne />

      {/* PromotionalOne */}
      <PromotionalOne />

      {/* FlashSalesOne */}
      <FlashSalesOne />

      {/* ProductListOne */}
      <ProductListOne />

      {/* OfferOne */}
      <OfferOne />

      {/* RecommendedOne */}
      <RecommendedOne />

      {/* HotDealsOne */}
      <HotDealsOne />

      {/* TopVendorsOne */}
      <TopVendorsOne />

      {/* BestSellsOne */}
      <BestSellsOne />

      {/* DeliveryOne */}
      <DeliveryOne />

      {/* OrganicOne */}
      <OrganicOne />

      {/* ShortProductOne */}
      <ShortProductOne />

      {/* BrandOne */}
      <BrandOne />

      {/* NewArrivalOne */}
      <NewArrivalOne />

      {/* ShippingOne */}
      <ShippingOne />

      {/* NewsletterOne */}
      <NewsletterOne />

      {/* FooterOne */}
      <FooterOne />

      {/* BottomFooter */}
      <BottomFooter />


    </>
  );
};

export default HomePageOne;
