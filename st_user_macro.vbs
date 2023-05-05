Option Base 0
Option Explicit

Const BASE_GROUPS_INDEX = 10
Const MAX_GROUPS_INDEX = 100

Dim tot$

Private Sub printText(value)
Dim i%, n%
Dim c$
Debug.Print "'";
For i = 1 To Len(value)
    c = Mid(value, i, 1)
    If c = "'" Then Debug.Print "\";
    Debug.Print c;
Next
Debug.Print "'";
End Sub

Private Sub exportUsers()
Dim i%, j%, nn%
Dim badge$, name$, surname$, userpass$, email$
Dim username$, default_color$, fullname$, group$, groupIndex$
Dim v
Dim ws As Worksheet
Set ws = Sheets(1)
i = 1
Dim index%
Do
    i = i + 1
    If Trim(ws.Cells(i, 1)) = "" Then Exit Do
    badge$ = Trim(ws.Cells(i, 1))
    fullname$ = Trim(ws.Cells(i, 2))
    username$ = LCase(Trim(ws.Cells(i, 3)))
    userpass$ = Trim(ws.Cells(i, 4))
    group$ = Trim(ws.Cells(i, 5))
    name$ = ""
    surname$ = ""
    email$ = ""
    v = Split(fullname$, " ")
    nn = UBound(v)
    For j = 0 To nn
        If j = nn Then
            name$ = UCase(Mid(Trim(v(j)), 1, 1)) & LCase(Mid(Trim(v(j)), 2))
            email$ = LCase(name$) & "." & email$ & "@urmet.com"
        Else
            If Len(surname$) > 0 Then surname$ = surname$ & " "
            surname$ = surname$ & UCase(Mid(Trim(v(j)), 1, 1)) & LCase(Mid(Trim(v(j)), 2))
            email$ = email$ & LCase(Trim(v(j)))
        End If
    Next
    Dim e$, c$
    e$ = ""
    For j = 1 To Len(email$)
        c = LCase(Mid(email$, j, 1))
        If InStr("abcdefghijklmnopqrstuvwxyz0123456789.@", c) > 0 Then
            e$ = e$ & c$
        End If
    Next
    email$ = e$
    default_color$ = LCase(Trim(ws.Cells(i, 6)))
    Debug.Print "INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) "
    Debug.Print "   VALUES (";
    printText name$
    Debug.Print ", ";
    printText surname$
    Debug.Print ", ";
    printText email$
    Debug.Print ", ";
    printText username$
    Debug.Print ", MD5(";
    printText userpass$
    Debug.Print "), ";
    Debug.Print "1, ";
            
    j = InStr(tot, "|" & group & "|")
    j = j + Len("|" & group & "|")
    groupIndex$ = Mid(tot, j)
    groupIndex$ = Mid(groupIndex$, 1, InStr(groupIndex$, "|") - 1)
    
    index = CInt(groupIndex$)
    Debug.Print index;
           
    Debug.Print ", '";
    Debug.Print default_color;
    Debug.Print "', ";
    printText badge$
    Debug.Print ");"
Loop
End Sub

Private Sub exportGroups()
Dim i%, j%, k%, count%, index%
Dim group$
Dim v
Dim ws As Worksheet
Set ws = Sheets(1)
i = 1
count% = 0
index% = 0
tot$ = ""
Do
    i = i + 1
    If Trim(ws.Cells(i, 1)) = "" Then Exit Do
    group$ = LCase(Trim(ws.Cells(i, 5)))
    If InStr(tot$, "|" & group$ & "|") = 0 Then
        index% = count + BASE_GROUPS_INDEX
        Debug.Print "INSERT INTO `groups` (`id`, `name`) ";
        Debug.Print "VALUES (";
        Debug.Print index;
        Debug.Print ", ";
        printText group$
        Debug.Print ");"
        tot = tot & "|" & group$ & "|" & index & "|"
        count = count + 1
    End If
Loop
End Sub

Public Sub mysqlExport()
    Debug.Print "--"
    Debug.Print "-- Groups"
    Debug.Print "--"
    exportGroups
    Debug.Print "--"
    Debug.Print "-- Users"
    Debug.Print "--"
    exportUsers
End Sub



