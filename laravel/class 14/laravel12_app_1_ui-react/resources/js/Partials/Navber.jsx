import { Link } from '@inertiajs/react'
import React from 'react'

export default function Navber() {
  return (
    <>
     <nav className="navbar navbar-expand-sm bg-dark navbar-dark">
  <div className="container-fluid">
    <ul className="navbar-nav">
      <li className="nav-item">
        <Link className="nav-link active" href="/">Home</Link>
      </li>
      <li className="nav-item">
        <Link className="nav-link " href="/product">Product</Link>
      </li>
      <li className="nav-item">
        <Link className="nav-link" href="/about">About</Link>
      </li>
      <li className="nav-item">
        <Link className="nav-link" href="/contact">Contact</Link>
      </li>
      <li className="nav-item">
        <Link className="nav-link disabled" href="#">Disabled</Link>
      </li>
      <li className="nav-item">
        <Link className="nav-link" href="/login">Login</Link>
      </li>
    </ul>
  </div>
</nav>
 
    </>
  )
}
