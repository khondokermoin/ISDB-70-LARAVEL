import React from 'react';
import { Link } from '@inertiajs/react';
import Banner from '@/Partials/Banner';
import Navber from '@/Partials/Navber';
import Footer from '@/Partials/Footer';

export default function Product({ product }) {

    const products = product || [];

    return (
        <>
            <Banner />
            <Navber />

            <div className="container mt-5 mb-5">
                <h2 className="text-center fw-bold mb-4">Our Products</h2>

                <div className="row g-4">

                    {products.length > 0 ? (

                        products.map((item) => (

                            <div key={item.id} className="col-12 col-sm-6 col-lg-4 col-xl-3">

                                <div className="card h-100 shadow-sm border-0">

                                    <img
                                        src={
                                            item.image
                                                ? `/storage/${item.image}`
                                                : "https://via.placeholder.com/400x250?text=No+Image"
                                        }
                                        className="card-img-top"
                                        alt={item.name}
                                        style={{
                                            height: "220px",
                                            objectFit: "cover"
                                        }}
                                    />

                                    <div className="card-body d-flex flex-column">

                                        <small className="text-muted text-uppercase fw-bold">
                                            {item.category === 1
                                                ? "Electronics"
                                                : item.category === 2
                                                ? "Fashion"
                                                : "Uncategorized"}
                                        </small>

                                        <h5 className="mt-2">
                                            <Link
                                                href={`/product/${item.id}`}
                                                className="text-decoration-none text-dark"
                                            >
                                                {item.name}
                                            </Link>
                                        </h5>

                                        <p className="text-muted small flex-grow-1">
                                            {item.description}
                                        </p>

                                        <div className="d-flex justify-content-between align-items-center mt-3">

                                            <span className="fw-bold text-primary fs-5">
                                                ৳{Number(item.price).toLocaleString()}
                                            </span>

                                            <span
                                                className={`badge ${
                                                    item.status
                                                        ? "bg-success"
                                                        : "bg-danger"
                                                }`}
                                            >
                                                {item.status
                                                    ? "In Stock"
                                                    : "Out of Stock"}
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        ))

                    ) : (

                        <div className="col-12">
                            <div className="alert alert-warning text-center">
                                No products found.
                            </div>
                        </div>

                    )}

                </div>
            </div>

            <Footer />
        </>
    );
}