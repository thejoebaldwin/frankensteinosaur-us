---
author: admin
comments: true
date: 2011-10-23 11:54:28
layout: post
slug: now-with-more-textures
title: Now! with more textures
wordpress_id: 264
categories:
- iOS
- OpenGL
---

Got textures working in iOS & OpenGL. I struggled with this one for a bit... I had all the code correctly but I neglected the importance of using texture images that are in THE POWER OF TWO. iOS will just not show the texture, the program won't crash or anything (which I guess is nice). Anyways.  that means that if you want to use a square image for example, it can't be 119 x 119 pixels in resolution. You would want to make it 128 x 128. In my case, I used 512 x 512. In the video below I had two textures that I made in Inkscape, one just a circle with transparent background, the other a circle with some blurring and a darker circular line within it. Both were PNGs and 512 x 512. The texture that is shown after clicking is the same dimension as the other, but held up side-by-side the circle would appear smaller. The images themselves were white, the color is coming through the Quads, which if you look at my previous post you'd see are indeed colored (randomly).


