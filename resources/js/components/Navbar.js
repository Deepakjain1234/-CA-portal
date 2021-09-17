import React, { useState } from 'react'
import * as favIcon from 'react-icons/fa'
import * as ai from 'react-icons/ai'
import { Link } from 'react-router-dom'
import { SidebarData } from './SideBarData'
import { IconContext } from 'react-icons';


function Navbar() {
    const [sidebar, setSideBar] = useState(false)
    const showSideBar = () => {
        setSideBar(!sidebar)
    }
    
    return (
        <>
            <IconContext.Provider value={{ color: '#fff' }}>
                <div className="navbar">
                    <Link to="#" className="menu-bars">
                        <favIcon.FaBars onClick={showSideBar} />
                    </Link>
                    <form action="/logout" method="post">
                        <button type="submit" className="btn btn-primary logout-btn">LogOut</button>
                    </form>
                </div>
                <nav className={sidebar ? 'nav-menu active' : 'nav-menu'}>
                    <ul className="nav-menu-items" onClick={showSideBar}>
                        <li className="navbar-toggle">
                            <Link to="#" className="menu-bars">
                                <ai.AiOutlineClose />
                            </Link>
                        </li>
                        {SidebarData.map((item, index) => {
                            return (
                                <li key={index} className={item.cName}>
                                    <Link to={item.path}>
                                        {item.icon}
                                        <span>{item.title}</span>
                                    </Link>
                                </li>
                            );
                        })}
                    </ul>
                </nav>
            </IconContext.Provider>

        </>
    )
}

export default Navbar
