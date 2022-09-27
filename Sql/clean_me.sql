select E.Nom, E.Prenom from eleve as E inner join inscrire on E.IdEleve=inscrire.IdEl

-- la liste qui marche
select E.Nom, E.Prenom,Ins.IdInscrip, Ev.Cotes, Ev.maximun_cotes, C.DesigCours from eleve as E INNER JOIN inscrire as Ins ON Ins.IdEl=E.IdEleve inner join evaluer as Ev ON Ev.IdInscrip=Ins.IdInscrip inner join cours as C on C.IdCours=Ev.IdCours
-- Version 2.0
select E.Nom, E.Prenom,Ins.IdInscrip, Ev.Cotes, SUM(Ev.Cotes) as SOMMME , SUM(Ev.maximun_cotes) as TotalMax,(SUM(Ev.Cotes)/SUM(Ev.maximun_cotes)*100 ) as Pourcentage, Ev.maximun_cotes, C.DesigCours from eleve as E INNER JOIN inscrire as Ins ON Ins.IdEl=E.IdEleve inner join evaluer as Ev ON Ev.IdInscrip=Ins.IdInscrip inner join cours as C on C.IdCours=Ev.IdCours 

-- Liste des eleves inscrits 

select Cl.Designation, Ins.AnneeInscrip, El.Nom, El.Prenom from Eleve as El inner join  Inscrire as Ins on Ins.IdEl=El.IdEleve inner join Classe as Cl on 	Ins.IdCl=Cl.IdCl

-- Nombre total des eleves inscrits par classe et / annee

select Cl.Designation, Ins.AnneeInscrip, El.Nom, El.Prenom,(Select COUNT(Ins.IdEl) )as TotalEleve  from Eleve as El inner join  Inscrire as Ins on Ins.IdEl=El.IdEleve inner join Classe as Cl on Cl.IdCl=Ins.IdCl GROUP BY Cl.Designation,Ins.AnneeInscrip


-- Ca recupere tous les cours, Cotes par cour de l'eleve de chaque classe
SELECT Ev.Cotes,Ev.CoteMax,Ev.Periode,El.Nom,El.PostNom,El.Prenom,C.DesigCours,Cl.Designation,Ins.AnneeInscrip,SUM(Ev.Cotes) AS SOMME FROM Eleve AS El INNER JOIN Inscrire AS Ins ON Ins.IdEl=El.IdEleve INNER JOIN Evaluer AS Ev ON Ev.IdInscrip=Ins.IdInscrip INNER JOIN  Cours AS C On C.IdCours=Ev.IdCours INNER JOIN Classe AS Cl ON Cl.IdCl=Ins.IdCl Group By SUM(Ev.Cotes) Where Ins.AnneeInscrip='2022' AND Ins.IdCl=2

-- CA RECUPERE LA LISTE DES COTES (COTATION) D'UN ELEVE
SELECT Ev.Cotes,Ev.CoteMax,Ev.Periode,El.Nom,El.PostNom,El.Prenom,C.DesigCours,Cl.Designation,Ins.AnneeInscrip,SUM(Ev.Cotes) AS SOMMEC,SUM(Ev.CoteMax) AS SOMMEMAX,((100* SUM(Ev.Cotes)/(SELECT SUM(Ev.CoteMax)) )) AS POURC FROM Eleve AS El INNER JOIN Inscrire AS Ins ON Ins.IdEl=El.IdEleve INNER JOIN Evaluer AS Ev ON Ev.IdInscrip=Ins.IdInscrip INNER JOIN  Cours AS C On C.IdCours=Ev.IdCours INNER JOIN Classe AS Cl ON Cl.IdCl=Ins.IdCl WHERE  Ins.IdInscrip='E1' Group By Ins.IdInscrip,Cl.Designation,Ins.AnneeInscrip,C.DesigCours


-- CLEAN
select Cl.Designation, E.Nom, E.Prenom,Ins.IdInscrip, Ev.Cotes, SUM(Ev.Cotes) as SOMMME , SUM(Ev.maximun_cotes) as TotalMax, Max(SUM(Ev.Cotes)/SUM(Ev.maximun_cotes)*100 ) as Place ,(SUM(Ev.Cotes)/SUM(Ev.maximun_cotes)*100 ) as Pourcentage, Ev.maximun_cotes, C.DesigCours,(SELECT COUNT(Ins.IdInscrip) FROM inscrire as Ins WHERE  ) as Total from eleve as E INNER JOIN inscrire as Ins ON Ins.IdEl=E.IdEleve INNER JOIN classe as Cl ON Ins.IdCl=Cl.IdCl inner join evaluer as Ev ON Ev.IdInscrip=Ins.IdInscrip inner join cours as C on C.IdCours=Ev.IdCours GROUP BY Cl.Designation,Ins.AnneeInscrip