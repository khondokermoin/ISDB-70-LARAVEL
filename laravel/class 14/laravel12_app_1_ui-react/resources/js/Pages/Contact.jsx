import React from "react";
import Banner from "@/Partials/Banner";
import Navber from "@/Partials/Navber";
import Footer from "@/Partials/Footer";
import { Form } from "@inertiajs/react";

export default function Contact() {
    return (
        <>
            <Banner />
            <Navber />

            <div className="container my-5">
                <div className="row justify-content-center">
                    <div className="col-lg-8">
                        <div className="card shadow border-0">
                            <div className="card-header bg-primary text-white">
                                <h3 className="mb-0">Contact Us</h3>
                            </div>

                            <div className="card-body">
                                <Form action="/send" method="post">
                                    <div className="row">
                                        <div className="col-md-6 mb-3">
                                            <label className="form-label">
                                                Full Name
                                            </label>
                                            <input
                                                type="text"
                                                name="name"
                                                className="form-control"
                                                placeholder="Enter your name"
                                            />
                                        </div>

                                        <div className="col-md-6 mb-3">
                                            <label className="form-label">
                                                Email Address
                                            </label>
                                            <input
                                                type="email"
                                                name="email"
                                                className="form-control"
                                                placeholder="Enter your email"
                                            />
                                        </div>
                                    </div>

                                    <div className="mb-3">
                                        <label className="form-label">
                                            Phone Number
                                        </label>
                                        <input
                                            type="text"
                                            name="phone"
                                            className="form-control"
                                            placeholder="Enter your phone number"
                                        />
                                    </div>

                                    <div className="mb-3">
                                        <label className="form-label">
                                            Subject
                                        </label>
                                        <input
                                            type="text"
                                            name="subject"
                                            className="form-control"
                                            placeholder="Enter subject"
                                        />
                                    </div>

                                    <div className="mb-3">
                                        <label className="form-label">
                                            Message
                                        </label>
                                        <textarea
                                            name="message"
                                            className="form-control"
                                            rows="5"
                                            placeholder="Write your message..."
                                        ></textarea>
                                    </div>

                                    <button
                                        type="submit"
                                        className="btn btn-primary w-100"
                                    >
                                        Send Message
                                    </button>
                                </Form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <Footer />
        </>
    );
}
