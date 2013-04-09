SELECT e.ucid as studentid,
       c.courseid AS courseid, c.coursename AS coursename,
       s.sectionid as sectionid, s.semesterid as semesterid,
       u.name as teachername
FROM sections as s, enrolled as e, courses as c, users as u
WHERE e.crn = s.crn
AND s.courseid = c.courseid
AND s.teacherid = u.ucid
AND e.ucid='thh4' 
AND s.semesterid='20131';

-- track on ucid and semesterid to display courseid, coursename, sectionid, and teacherid
