import express from 'express'
import dotenv from 'dotenv'
import mongoose from 'mongoose'
import cors from 'cors'
import cookieParser from 'cookie-parser'
import tourRoute from './router/tours.js'
import userRoute from './router/users.js'
import authRoute from './router/auth.js'
import reviewRoute from './router/reviews.js'
import bookingRoute from './router/booking.js'

dotenv.config()
const app = express()
const port = process.env.PORT || 8000
const corsOptions = {
    origin: "http://localhost:3000",
    credential: true
}

app.use(function(req, res, next) {
    // Website you wish to allow to connect
    res.setHeader('Access-Control-Allow-Origin', process.env.REACT_URL)

    // Request methods you wish to allow
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE')

    // Request header you wish to allow to connect
    res.setHeader('Access-Control-Allow-Origin', 'X-Requested-With, content-type')

    // Set to the true if you need website to include cookies in the request sent to API
    res.setHeader('Access-Control-Allow-Credentials', 'true')

    next();
})

//test server
// app.get('/', (req, res) => {
//     res.send("api is working")
// })

//database connection
mongoose.set('strictQuery', false)
const connect = async()=>{
    try {
        await mongoose.connect(process.env.MONGO_URI,{
            useNewUrlParser: true,
            useUnifiedTopology: true
        })

        console.log('MongoDB database connected')
    } catch (error) {
        console.log('MongoDB database connection failed')
    }
}

//middleware
app.use(express.json())
app.use(cors(corsOptions))
app.use(cookieParser())
app.use('/api/v1/auth', authRoute)
app.use('/api/v1/tours', tourRoute)
app.use('/api/v1/users', userRoute)
app.use('/api/v1/reviews', reviewRoute)
app.use('/api/v1/booking', bookingRoute)

app.listen(port, ()=>{
    connect()
    console.log('listening on port', port) 
})