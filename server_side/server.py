import SocketServer
import os
class MyTCPHandler(SocketServer.BaseRequestHandler):
    def handle(self):
        #gelen veriyi al(1024byte'a kadar)
        self.data = self.request.recv(1024).strip()
		#gonderenin ip'sini ve gelen veriyi yaz
        print "{} dedi ki:".format(self.client_address[0])
        print self.data

if __name__ == "__main__":
	#kurdugumuz server'in IP adresi ve port numarasý
    HOST, PORT = "localhost", 6879

    # Create the server, binding to localhost on port 9999
    server = SocketServer.TCPServer((HOST, PORT), MyTCPHandler)

    # Activate the server; this will keep running until you
    # interrupt the program with Ctrl-C
    server.serve_forever()


