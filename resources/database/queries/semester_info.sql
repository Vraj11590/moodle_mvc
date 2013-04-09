SELECT e.ucid AS studentid,
       c.courseid AS courseid, c.coursename AS coursename,
       s.sectionid AS sectionid, s.semesterid AS semesterid,
       u.name AS teachername
FROM sections AS s, enrolled AS e, courses AS c, users AS u
WHERE e.crn = s.crn
AND s.courseid = c.courseid
AND s.teacherid = u.ucid
AND e.ucid='thh4' 
AND s.semesterid='20131';

-- track on ucid and semesterid to display courseid, coursename, sectionid, and teacherid
