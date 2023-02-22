import mysql.connector

def connect_to_database():
    cnx = mysql.connector.connect(
        host="localhost",
        user="your_username",
        password="your_password",
        database="your_database"
    )
    return cnx

def read_from_database(cnx):
    cursor = cnx.cursor()

    query = "SELECT * FROM your_table"
    cursor.execute(query)

    for row in cursor:
        print(row)

    cursor.close()

def write_to_database(cnx):
    cursor = cnx.cursor()

    query = "INSERT INTO your_table (column1, column2) VALUES (%s, %s)"
    values = ("value1", "value2")

    cursor.execute(query, values)

    cnx.commit()

    cursor.close()

def update_in_database(cnx):
    cursor = cnx.cursor()

    query = "UPDATE your_table SET column1 = %s WHERE column2 = %s"
    values = ("new_value1", "value2")

    cursor.execute(query, values)

    cnx.commit()

    cursor.close()

def delete_from_database(cnx):
    cursor = cnx.cursor()

    query = "DELETE FROM your_table WHERE column2 = %s"
    values = ("value2",)

    cursor.execute(query, values)

    cnx.commit()

    cursor.close()

cnx = connect_to_database()
read_from_database(cnx)
write_to_database(cnx)
update_in_database(cnx)
delete_from_database(cnx)
cnx.close()
