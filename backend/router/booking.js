import express from 'express'
import { verifyAdmin, verifyUser } from '../utils/verifyToken.js'
import { creatBooking, getAllBooking, getBooking } from '../controllers/bookingController.js'

const router = express.Router()

router.post('/', verifyUser, creatBooking)

router.get('/:id', verifyUser, getBooking)

router.get('/', verifyAdmin, getAllBooking)

export default router