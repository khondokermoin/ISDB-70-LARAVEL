import React from 'react'

export default function Header() {

    const Logo = () => {
        return (
            <div className="header-logo">
                <a href="index.html">
                    <img src="assets/img/logo/logo-black.png" alt="Logo" />
                </a>
            </div>
        )
    }

    return (
        <>
            <header className="header-area">
                <div className="container">
                    <div className="row align-items-center">
                        <Logo />
                    </div>
                </div>
            </header>
        </>
    )
}
