CVHS.me is a URL shortener that I built for my high school.

**Another URL shortener?**

Yup. However, this one solves a specific problem. Most URL shorteners are designed to reduce the URL length. They are hard to remember. This project solves a unique pain point that exist for a lot of students and teachers: most school website platforms/templates/services have difficult-to-remember URLs. For students to access a teacher's page, they often need to click through a plathora of links in the navigation bar. This project allows a teacher to simply use their last name as the URL slug. For example, (CVHS.me/lepell)[http://cvhs.me/lepell] goes to the website of my favorite teacher of all time, Ms. LePell. The short URL allows students to remember it more easily and teachers to share them more comfortably.

**How does it work?**

`index.php`: everyone can see all the avaliable short URLs and click to go to a teacher's website.

`add.php`: a school administrator can manually add an entry by providing the long URL, the short slug, and the teacher's name.

`url.php`: redirects from the short URL to the correct long URL

**"Ew, it is in PHP."**

I know. PHP was the first language I learned, and the only language I knew when I was in 10th grade. And I built this when I was a Sophomore at Castro Valley High School.

Even though PHP was not a beautiful language, it has taught me `if` statements and `while` loops, what a `POST` request looks like and how to do a MySQL query.

**"Can I use it for my high school?"**

Of course. All you need is an Apache server that runs PHP and a MySQL database. Additionally, you need to purchase a domain for the URL shortener. Remember to edit your school name and URL throughout the code base.

**"Can I use it for anything?"**

Sure. This works best as a URL shortener for a school, but feel free to modify it in any ways you like.


