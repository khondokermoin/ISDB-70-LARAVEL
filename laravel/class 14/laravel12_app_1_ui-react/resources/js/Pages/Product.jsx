import React from 'react';
import { Link } from '@inertiajs/react';
import Banner from '@/Partials/Banner';  
import Navber from '@/Partials/Navber';  
import Footer from '@/Partials/Footer';

export default function Product() {
    // Dummy data (Later you can replace this with: const { products } = usePage().props;)
    const products = [
        {
            id: 1,
            name: "Wireless Headphones",
            category: "Electronics",
            price: 59.99,
            oldPrice: 79.99,
            image: "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&auto=format&fit=crop&q=60",
            description: "Premium noise-cancelling wireless headphones with 20h battery life."
        },
        {
            id: 2,
            name: "Smart Watch Pro",
            category: "Wearables",
            price: 129.50,
            image: "https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&auto=format&fit=crop&q=60",
            description: "Track your fitness, heart rate, and notifications on the go."
        },
        {
            id: 3,
            name: "Mechanical Keyboard",
            category: "Accessories",
            price: 89.00,
            oldPrice: 110.00,
            image: "https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=500&auto=format&fit=crop&q=60",
            description: "RGB backlit mechanical keyboard with blue switches for typing."
        },
        {
            id: 4,
            name: "Minimalist Backpack",
            category: "Fashion",
            price: 45.00,
            image: "https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=500&auto=format&fit=crop&q=60",
            description: "Water-resistant daily backpack with laptop compartment."
        }
    ];

    return (
        <>
            <Banner />
            <Navber />
            
            <div className="container mt-5 mb-5">
                <h2 className="text-center fw-bold mb-4">Our Products</h2>
                
                <div className="row g-4">
                    {products.map((product) => (
                        <div key={product.id} className="col-12 col-sm-6 col-lg-4 col-xl-3">
                            
                            {/* Inline Product Card */}
                            <div className="card h-100 shadow-sm border-0">
                                {/* Image */}
                                <img 
                                    src={product.image} 
                                    className="card-img-top" 
                                    alt={product.name} 
                                    style={{ height: '200px', objectFit: 'cover' }} 
                                />
                                
                                {/* Content */}
                                <div className="card-body d-flex flex-column">
                                    <small className="text-muted text-uppercase fw-bold" style={{ fontSize: '0.75rem' }}>
                                        {product.category}
                                    </small>
                                    
                                    <h5 className="card-title mt-1 mb-2">
                                        <Link href={`/product/${product.id}`} className="text-decoration-none text-dark stretched-link">
                                            {product.name}
                                        </Link>
                                    </h5>
                                    
                                    <p className="card-text text-muted small flex-grow-1">
                                        {product.description}
                                    </p>

                                    {/* Price & Button */}
                                    <div className="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                        <div>
                                            {product.oldPrice && (
                                                <small className="text-decoration-line-through text-muted me-2">
                                                    ${product.oldPrice}
                                                </small>
                                            )}
                                            <span className="h5 mb-0 text-primary fw-bold">
                                                ${product.price}
                                            </span>
                                        </div>
                                        <button className="btn btn-primary btn-sm rounded-pill px-3">
                                            <i className="bi bi-cart-plus me-1"></i> Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {/* End Inline Product Card */}

                        </div>
                    ))}
                </div>
            </div>

            <Footer />
        </>
    );
}