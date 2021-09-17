import React from 'react';
import * as FaIcons from 'react-icons/fa';
import * as AiIcons from 'react-icons/ai';
import * as IoIcons from 'react-icons/io';
import * as gr from "react-icons/gr";
import * as gi from "react-icons/gi";
import * as cg from "react-icons/cg";
import * as bs from "react-icons/bs";

export const SidebarData = [
  {
    title: 'New Task',
    path: '/user_panel',
    icon: <bs.BsListTask />,
    cName: 'nav-text'
  },
  {
    title: 'Submitted Tasks',
    path: '/user_panel/submitted_task',
    icon: <AiIcons.AiFillHome />,
    cName: 'nav-text'
  },
  {
    title: 'Leaderboard',
    path: '/user_panel/leaderboard',
    icon: <gi.GiRank3/>,
    cName: 'nav-text'
  },
  {
    title: 'Profile',
    path: '/user_panel/profile',
    icon: <cg.CgProfile />,
    cName: 'nav-text'
  }
];