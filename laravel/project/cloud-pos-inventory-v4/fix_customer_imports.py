from pathlib import Path
import re

root = Path('resources/js/Customer')

# Fix HomePageOne import paths
home = root / 'Pages' / 'HomePageOne.jsx'
text = home.read_text()
replacements = {
    'import Preloader from "../helper/Preloader";': 'import Preloader from "../Helpers/Preloader";',
    'import ColorInit from "../helper/ColorInit";': 'import ColorInit from "../Helpers/ColorInit";',
    'import HeaderOne from "../components/HeaderOne";': 'import HeaderOne from "../Components/Customer/HeaderOne";'.replace('Customer/Customer', 'Customer'),
}
# Actually we only need to use ../Components/..., not Customer/Customer
replacements = {
    'import Preloader from "../helper/Preloader";': 'import Preloader from "../Helpers/Preloader";',
    'import ColorInit from "../helper/ColorInit";': 'import ColorInit from "../Helpers/ColorInit";',
    'import HeaderOne from "../components/HeaderOne";': 'import HeaderOne from "../Components/HeaderOne";',
    'import BannerOne from "../components/BannerOne";': 'import BannerOne from "../Components/BannerOne";',
    'import FeatureOne from "../components/FeatureOne";': 'import FeatureOne from "../Components/FeatureOne";',
    'import PromotionalOne from "../components/PromotionalOne";': 'import PromotionalOne from "../Components/PromotionalOne";',
    'import FlashSalesOne from "../components/FlashSalesOne";': 'import FlashSalesOne from "../Components/FlashSalesOne";',
    'import ProductListOne from "../components/ProductListOne";': 'import ProductListOne from "../Components/ProductListOne";',
    'import OfferOne from "../components/OfferOne";': 'import OfferOne from "../Components/OfferOne";',
    'import RecommendedOne from "../components/RecommendedOne";': 'import RecommendedOne from "../Components/RecommendedOne";',
    'import HotDealsOne from "../components/HotDealsOne";': 'import HotDealsOne from "../Components/HotDealsOne";',
    'import TopVendorsOne from "../components/TopVendorsOne";': 'import TopVendorsOne from "../Components/TopVendorsOne";',
    'import BestSellsOne from "../components/BestSellsOne";': 'import BestSellsOne from "../Components/BestSellsOne";',
    'import DeliveryOne from "../components/DeliveryOne";': 'import DeliveryOne from "../Components/DeliveryOne";',
    'import OrganicOne from "../components/OrganicOne";': 'import OrganicOne from "../Components/OrganicOne";',
    'import ShortProductOne from "../components/ShortProductOne";': 'import ShortProductOne from "../Components/ShortProductOne";',
    'import BrandOne from "../components/BrandOne";': 'import BrandOne from "../Components/BrandOne";',
    'import NewArrivalOne from "../components/NewArrivalOne";': 'import NewArrivalOne from "../Components/NewArrivalOne";',
    'import ShippingOne from "../components/ShippingOne";': 'import ShippingOne from "../Components/ShippingOne";',
    'import NewsletterOne from "../components/NewsletterOne";': 'import NewsletterOne from "../Components/NewsletterOne";',
    'import FooterOne from "../components/FooterOne";': 'import FooterOne from "../Components/FooterOne";',
    'import BottomFooter from "../components/BottomFooter";': 'import BottomFooter from "../Components/BottomFooter";'
}
for old, new in replacements.items():
    text = text.replace(old, new)
home.write_text(text)

# Fix customer components router imports and routes
paths = list((root / 'Components').glob('*.jsx'))
for path in paths:
    text = path.read_text()
    text = re.sub(r'import \{\s*Link\s*,\s*NavLink\s*\} from ["\']react-router-dom["\'];', 'import { Link } from "@inertiajs/react";', text)
    text = re.sub(r'import \{\s*Link\s*\} from ["\']react-router-dom["\'];', 'import { Link } from "@inertiajs/react";', text)
    text = text.replace('<NavLink', '<Link')
    text = text.replace('to=', 'href=')
    text = re.sub(r'className=\{\(navData\) => navData\.isActive \? ["\']([^"\']*)["\'] : ["\']([^"\']*)["\']\}', r'className="\2"', text)
    path.write_text(text)

print('Fixed', len(paths), 'customer component files')