import { useState } from 'react';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const [showPassword, setShowPassword] = useState(false);

    const submit = (e) => {
        e.preventDefault();
        post(route('login'), {
            onFinish: () => reset('password'),
        });
    };

    return (
        <>
            <Head title="Log in" />

            <div className="container-fluid my-5">
                <div className="row">
                    <div className="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                        <div className="card border-3">
                            <div className="card-body p-5">
                                <img
                                    src="/assets/images/logo-icon.png"
                                    className="mb-4"
                                    width="45"
                                    alt="Logo"
                                />
                                <h4 className="fw-bold">Get Started Now</h4>
                                <p className="mb-0">Enter your credentials to login your account</p>

                                {status && (
                                    <div className="mb-4 text-sm font-medium text-success">
                                        {status}
                                    </div>
                                )}

                                <div className="row g-3 my-4">
                                    <div className="col-12 col-lg-6">
                                        <a
                                            href={route('auth.google')}
                                            className="btn btn-light py-2 font-text1 fw-bold d-flex align-items-center justify-content-center w-100"
                                        >
                                            <img
                                                src="/assets/images/icons/google-2.png"
                                                width="18"
                                                className="me-2"
                                                alt="Google"
                                            />
                                            Log In with Google
                                        </a>
                                    </div>
                                    <div className="col col-lg-6">
                                        <button
                                            type="button"
                                            className="btn btn-light py-2 font-text1 fw-bold d-flex align-items-center justify-content-center w-100"
                                        >
                                            <img
                                                src="/assets/images/icons/apple-logo.png"
                                                width="18"
                                                className="me-2"
                                                alt="Apple"
                                            />
                                            Log In with Apple
                                        </button>
                                    </div>
                                </div>

                                <div className="separator section-padding">
                                    <div className="line"></div>
                                    <p className="mb-0 fw-bold">OR</p>
                                    <div className="line"></div>
                                </div>

                                <div className="form-body mt-4">
                                    <form className="row g-3" onSubmit={submit}>
                                        {/* Email Field */}
                                        <div className="col-12">
                                            <label htmlFor="inputEmailAddress" className="form-label">
                                                Email
                                            </label>
                                            <input
                                                type="email"
                                                name="email"
                                                className={`form-control ${errors.email ? 'is-invalid' : ''}`}
                                                id="inputEmailAddress"
                                                placeholder="jhon@example.com"
                                                value={data.email}
                                                onChange={(e) => setData('email', e.target.value)}
                                                autoComplete="username"
                                                autoFocus
                                            />
                                            {errors.email && (
                                                <div className="invalid-feedback">{errors.email}</div>
                                            )}
                                        </div>

                                        {/* Password Field */}
                                        <div className="col-12">
                                            <label htmlFor="inputChoosePassword" className="form-label">
                                                Password
                                            </label>
                                            <div className="input-group" id="show_hide_password">
                                                <input
                                                    type={showPassword ? 'text' : 'password'}
                                                    name="password"
                                                    className={`form-control border-end-0 ${errors.password ? 'is-invalid' : ''}`}
                                                    id="inputChoosePassword"
                                                    placeholder="Enter Password"
                                                    value={data.password}
                                                    onChange={(e) => setData('password', e.target.value)}
                                                    autoComplete="current-password"
                                                />
                                                <button
                                                    type="button"
                                                    className="input-group-text bg-transparent"
                                                    onClick={() => setShowPassword(!showPassword)}
                                                    style={{ cursor: 'pointer' }}
                                                >
                                                    <i
                                                        className={`bi ${
                                                            showPassword ? 'bi-eye-fill' : 'bi-eye-slash-fill'
                                                        }`}
                                                    ></i>
                                                </button>
                                            </div>
                                            {errors.password && (
                                                <div className="invalid-feedback">{errors.password}</div>
                                            )}
                                        </div>

                                        {/* Remember Me */}
                                        <div className="col-md-6">
                                            <div className="form-check form-switch">
                                                <input
                                                    className="form-check-input"
                                                    type="checkbox"
                                                    id="flexSwitchCheckChecked"
                                                    checked={data.remember}
                                                    onChange={(e) => setData('remember', e.target.checked)}
                                                />
                                                <label className="form-check-label" htmlFor="flexSwitchCheckChecked">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>

                                        {/* Forgot Password */}
                                        <div className="col-md-6 text-end">
                                            {canResetPassword && (
                                                <Link href={route('password.request')} className="text-decoration-none">
                                                    Forgot Password?
                                                </Link>
                                            )}
                                        </div>

                                        {/* Submit Button */}
                                        <div className="col-12">
                                            <div className="d-grid">
                                                <button
                                                    type="submit"
                                                    className="btn btn-primary"
                                                    disabled={processing}
                                                >
                                                    {processing ? 'Logging in...' : 'Login'}
                                                </button>
                                            </div>
                                        </div>

                                        {/* Register Link */}
                                        <div className="col-12">
                                            <div className="text-start">
                                                <p className="mb-0">
                                                    Don't have an account yet?{' '}
                                                    <Link href={route('register')} className="text-decoration-none">
                                                        Sign up here
                                                    </Link>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}