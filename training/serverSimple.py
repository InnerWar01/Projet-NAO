import socket
import sys
import mysql.connector
    
HOST = '127.0.0.1'   # Symbolic name, meaning all available interfaces
PORT = 2000 # Arbitrary non-privileged port
 
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
print 'Socket created'

#Bind socket to local host and port
try:
    s.bind((HOST, PORT))
except socket.error as msg:
    print 'Bind failed. Error Code : ' + str(msg[0]) + ' Message ' + msg[1]
    sys.exit()
     
print 'Socket bind complete'
 
#Start listening on socket
s.listen(10)
print 'Socket now listening'

#-------------retourne combien de cases il y a apres un times +1------#
def fin(tab):
    k=1
    while(tab[k]!='END'):
        if(tab[k]=='times'):		
            tab[k]=' '
            b=tab[k:]
            i=fin(b)
            tab[k]='times'
            k=k+i
        else:
            k=k+1
    return k+1

#--------------interprete les blocks passes en parametre--------------#
def understandBlocks(tab):
    i=0
    while (i<len(tab)-1):
        if(i%2==0):
            if(tab[i]=='action'):
                if(tab[i+1]=='sitting'):
                    print 'sasseoir'
                elif(tab[i+1]=='standing'):
                    print 'debout'
                elif(tab[i+1]=='walkfront'):
                    print 'walkfront'
                elif(tab[i+1]=='walkback'):
                    print 'walkback'
            elif(tab[i]=='speak'):
                print 'Dire '+tab[i+1]
            elif(tab[i]=='times'):
                print 'times'
                tab[i]=' '
                b=tab[i:]
                #on determine la fin du while
                tmp=fin(b)
                b=tab[i:tmp+i]
                #nombre de repetitions
                j=int(tab[i+1])
                while(j>0):
                    understandBlocks(b)
                    j=j-1
                tab[i]='times'
                i=i+tmp-1
            elif(tab[i]=='wait'):
                print'wait' 
            elif(tab[i]=='reachout'):
                print'reachout'
            elif(tab[i]=='bend'):
                if(tab[i+1]=='legs'):
                    print 'bend legs'
                elif(tab[i+1]=='arms'):
                    print 'bend arms'
        i=i+1
    return;

#---------------now keep talking with the client-------------------#
while 1:
    #wait to accept a connection - blocking call
    client, addr = s.accept()
    print 'Connected with ' + addr[0] + ':' + str(addr[1])
    response = client.recv(255)
    
    print response

    #formater la reception
    tab=response.split(';')
    for i in range (0,len(tab)-2):
        tab[i]=tab[i].lstrip()
    print tab
	
    #--------------------verification avec base de donnees-----------------------------#
    verif=0
    i=2
    b=0
    conn = mysql.connector.connect(host="localhost",user="root",password="1991", database="panc")
    cursor = conn.cursor()

    cursor.execute("""SELECT Block_id, Block_value , Type_action, Name_action, Rank
        FROM block NATURAL JOIN  order_block_exercise 
        WHERE Exercise_id=%s
        ORDER BY Rank""",(tab[1],))

    rows = cursor.fetchall()

    for row in rows:
        if(i<len(tab)):
            #on verifie le type d'action
            if(tab[i]!=row[2]):
                print tab[i]			
                verif=1
                break
            else:
                #cas particulier du times avec Block_value
                if(tab[i]=='times'):
                    if(tab[i+1] !=row[1]):
                        print tab[i]
                        verif=1
                        break
                #on ne verifie pas le nom du say + END + reachout + wait
                elif(tab[i]=='speak')or (tab[i]=='END')or (tab[i]=='reachout') or (tab[i]=='wait'):
                    print "no name action"
                #on verifie le nom d'action 
                else:
                    if(tab[i+1]!=row[3]):
                        print tab[i]
                        verif=1
                        break
        else:
            verif=1
        i+=2
        b+=1

    if(len(tab)>b*2+3):
		verif=1

    if(verif==1):
        tab=['speak','Hey buddy, it is not really what we expected! Try again !']
    else:
        tab.insert(len(tab)-1,'speak')
        tab.insert(len(tab)-1,'Oh my god, did you just do the exercise correctly ? I am so proud of you !')        
		
    #renvoi au client
    print verif
    client.sendall(str(verif))
    #execution
    understandBlocks(tab)
    cursor.close()
    conn.close()
raw_input("Press enter to exit ")
s.close()

