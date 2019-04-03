import mysql.connector
import csv

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="Qwert3201",
  database="restaurant_grader"
)

cursor = mydb.cursor()
with open('r_gulshan.csv') as csv_file:
    # csv_reader = csv.reader(csv_file, delimiter=',')
    csv_data = csv.reader(csv_file, delimiter=',')
    # execute and insert the csv into the database.
    for row in csv_data:
        cursor.execute('INSERT INTO restaurants(name, type, location, link, thumbnail, rating, number, address)''VALUES(%s, %s, %s, %s, %s, %s, %s, %s)',row)
        # print (row)
    #close the connection to the database.
    mydb.commit()
    cursor.close()
    print ("CSV has been imported into the database")
