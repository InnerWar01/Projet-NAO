import socket
import sys
import mysql.connector
    
HOST = '127.0.0.1'   # Symbolic name, meaning all available interfaces
PORT = 333 # Arbitrary non-privileged port
 
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

    #execution
    understandBlocks(tab)
raw_input("Press enter to exit ")
s.close()

