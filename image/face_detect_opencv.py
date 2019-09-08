import cv2
print(cv2.__version__)
vidcap = cv2.VideoCapture(0)
success,image = vidcap.read()
count = 0
success = True
while success and count<=20:
  cv2.imwrite("training-data/s1/%d.jpg" % count, image)     # save frame as JPEG file
  success,image = vidcap.read()
  print("Read a new frame: ",success)
  count += 1
