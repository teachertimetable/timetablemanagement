@echo off

echo    ===========================================================
echo     TTTTTTT BBBBB   MM    MM   GGGG  MM    MM TTTTTTT  SSSSS
echo       TTT   BB   B  MMM  MMM  GG  GG MMM  MMM   TTT   SS
echo       TTT   BBBBBB  MM MM MM GG      MM MM MM   TTT    SSSSS
echo       TTT   BB   BB MM    MM GG   GG MM    MM   TTT        SS
echo       TTT   BBBBBB  MM    MM  GGGGGG MM    MM   TTT    SSSSS
echo    ===========================================================
echo            TIMETABLE MANAGEMENT SYSTEM FOR DIGITECH SUT
echo    ===========================================================
echo                        DEBUGGING SESSION
echo    ===========================================================

start chrome http://localhost:80
php artisan serve --host=0.0.0.0 --port=80
