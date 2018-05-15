SELECT assignment.assignid, subject.subname, assignment.content, assignment.date
FROM assignment, subject
WHERE assignment.subid = subject.subid AND assignment.subid=3



SELECT * FROM students 
WHERE sem=(select sem from subject WHERE subid=5) and students.stdid not in (select stdid from attendance where date='2018-05-09')


***
stu attendance view
SELECT name,students.sem,date,status,subname FROM attendance, students,subject WHERE attendance.stdid=students.stdid AND attendance.date='2018-05-14' and attendance.stdid=33 and attendance.subid=19